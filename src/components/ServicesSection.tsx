import React, { useEffect, useMemo, useRef, useState } from "react";
import { motion, AnimatePresence, useReducedMotion } from "framer-motion";

/**
 * ServicesSection
 * - 10 cards in rotation, 5 visible at once
 * - 3:4 aspect, anchored bottom, max-height ~28vh
 * - 10s autoplay, arrows on LG+ only
 * - Right side shows title/sub for current heroIndex
 * - No grey seam: section background is #0f0f10
 */

type Card = { title: string; sub: string; img: string };

const CARDS: Card[] = [
  { title: "Omnichannel Payments",        sub: "Accept cards, ACH, and contactless—online, in-app, and in-store.",           img: "/assets/img/card1land.webp"  },
  { title: "AI-Powered Fraud Detection",  sub: "Protect every transaction with adaptive machine learning.",                   img: "/assets/img/card2land.webp"  },
  { title: "Mobile Commerce",             sub: "Checkout that moves with your team—fast, secure, reliable.",                  img: "/assets/img/card3land.webp"  },
  { title: "Flexible Payment Options",    sub: "Cards, ACH, wallets and more—meet customers where they are.",                 img: "/assets/img/card4land.webp"  },
  { title: "Integrations Library",        sub: "Connect the tools you already use to streamline operations.",                 img: "/assets/img/card5land.webp"  },
  { title: "Modern POS",                  sub: "Powerful, modular, and built for busy counters and quick lines.",             img: "/assets/img/card6land.webp"  },
  { title: "Recurring & Subscriptions",   sub: "Automated retries, dunning, and clean ledger flows out-of-the-box.",          img: "/assets/img/card7land.webp"  },
  { title: "Global Expansion",            sub: "Multi-currency support and smart routing to boost approvals.",                img: "/assets/img/card8land.webp"  },
  { title: "Realtime Analytics",          sub: "Latency, approvals, disputes—see and act on the signals that matter.",        img: "/assets/img/card9land.webp"  },
  { title: "Developer Friendly",          sub: "Clear docs, stable SDKs, and webhooks you can trust.",                        img: "/assets/img/card10land.webp" },
];

// Utility: center a given child in a horizontally scrollable container
function scrollToChild(viewport: HTMLDivElement, child: HTMLElement) {
  const left = child.offsetLeft - viewport.offsetWidth / 2 + child.offsetWidth / 2;
  viewport.scrollTo({ left, behavior: "smooth" });
}

export default function ServicesSection() {
  const reduceMotion = useReducedMotion();
  const cardsRef = useRef<HTMLDivElement | null>(null);
  const [heroIndex, setHeroIndex] = useState(0);
  const numCards = CARDS.length;

  const next = (idx: number) => (idx + 1) % numCards;
  const prev = (idx: number) => (idx - 1 + numCards) % numCards;

  // Keep the "highlighted/next" card visually indicated
  const highlightedIndex = useMemo(() => next(heroIndex), [heroIndex, numCards]);

  const updateState = (newHero: number) => {
    setHeroIndex(newHero);
    // after state updates, scroll the next/highlighted card into view
    requestAnimationFrame(() => {
      const viewport = cardsRef.current;
      if (!viewport) return;
      const child = viewport.children[next(newHero)] as HTMLElement | undefined;
      if (child) scrollToChild(viewport, child);
    });
  };

  const move = (dir: number) => updateState((heroIndex + dir + numCards) % numCards);

  const clickCard = (idx: number) => {
    // clicking a card makes it the highlighted "next"; show previous as hero
    const newHero = prev(idx);
    if (newHero !== heroIndex) updateState(newHero);
  };

  // Autoplay (10s cadence) with hover pause
  useEffect(() => {
    if (reduceMotion) return;
    let paused = false;
    let id: number | null = null;

    const tick = () => {
      if (!paused) move(1);
      id = window.setTimeout(tick, 10000);
    };

    id = window.setTimeout(tick, 10000);

    const el = cardsRef.current;
    const onEnter = () => { paused = true; };
    const onLeave = () => { paused = false; };

    el?.addEventListener("pointerenter", onEnter);
    el?.addEventListener("pointerleave", onLeave);

    return () => {
      if (id) clearTimeout(id);
      el?.removeEventListener("pointerenter", onEnter);
      el?.removeEventListener("pointerleave", onLeave);
    };
    // eslint-disable-next-line react-hooks/exhaustive-deps
  }, [heroIndex, reduceMotion]);

  // Init
  useEffect(() => { updateState(0); /* mount */ }, []);

  return (
    <section className="relative isolate w-full overflow-hidden bg-[#0f0f10] text-white">
      {/* Crossfading background behind the right text column */}
      <div className="absolute inset-0" aria-hidden>
        <AnimatePresence initial={false}>
          <motion.div
            key={heroIndex}
            className="absolute inset-0 bg-cover bg-center"
            style={{ backgroundImage: `url(${CARDS[heroIndex].img})` }}
            initial={reduceMotion ? undefined : { opacity: 0, scale: 1.03 }}
            animate={{ opacity: 1, scale: 1 }}
            exit={reduceMotion ? undefined : { opacity: 0 }}
            transition={{ duration: 0.25 }}
          />
        </AnimatePresence>
        <div className="absolute inset-0 pointer-events-none bg-transparent" />
      </div>

      {/* Desktop grid: rail left, text right */}
      <div className="relative z-10 mx-auto grid min-h-[86svh] max-w-7xl grid-cols-1 gap-8 px-6 pt-14 pb-8 lg:grid-cols-2 lg:items-stretch lg:gap-12 lg:px-10 lg:pt-20">
        {/* LEFT: Rail (anchored to bottom) */}
        <div className="order-1 flex flex-col lg:pl-4">
          <div className="mt-auto pb-5 md:pb-6">
            <div className="relative min-h-[28vh]">
              {/* Rail (reserve space for arrows on the right with padding) */}
              <div
                ref={cardsRef}
                className="flex w-full items-end gap-4 overflow-x-hidden overflow-y-visible scroll-smooth pr-14 lg:pr-24"
                aria-label="Services cards"
                style={{ ["--cards-visible" as any]: 5 }}
              >
                {CARDS.map((c, idx) => (
                  <button
                    key={c.title + idx}
                    onClick={() => clickCard(idx)}
                    className={[
                      "relative aspect-[3/4] flex-[0_0_auto] rounded-2xl bg-[#222] bg-cover bg-center shadow-2xl ring-1 ring-white/10 transition-transform duration-200",
                      "hover:scale-[1.03]",
                      highlightedIndex === idx ? "outline outline-2 outline-offset-2 outline-[#00CEDB]" : "",
                    ].join(" ")}
                    style={{
                      backgroundImage: `url(${c.img})`,
                      width:
                        "clamp(140px, calc((100% - (var(--cards-visible,5) - 1) * 1rem) / var(--cards-visible,5)), 220px)",
                      maxHeight: "28vh",
                      alignSelf: "flex-end",
                    }}
                    aria-label={`${c.title} card`}
                  >
                    <span className="sr-only">{c.title}</span>
                  </button>
                ))}
              </div>

              {/* Arrows (LG+ only), vertically centered at rail's right edge */}
              <div className="pointer-events-none absolute inset-y-0 right-0 hidden lg:flex items-center justify-end">
                <div className="pointer-events-auto flex gap-2">
                  <button
                    onClick={() => move(-1)}
                    className="h-11 w-11 rounded-full border border-white/30 bg-white/10 text-white"
                    aria-label="Previous cards"
                  >
                    ◀
                  </button>
                  <button
                    onClick={() => move(1)}
                    className="h-11 w-11 rounded-full border border-white/30 bg-white/10 text-white"
                    aria-label="Next cards"
                  >
                    ▶
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        {/* RIGHT: Text + CTAs for the current card */}
        <div className="order-2 relative flex flex-col items-start text-left">
          <h2
            className="font-semibold leading-[1.05] tracking-tight text-white"
            style={{
              fontFamily:
                "Ubuntu, system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif",
              fontSize: "clamp(2.2rem,5.2vw,4.2rem)",
            }}
          >
            {CARDS[heroIndex].title}
          </h2>
          <p className="max-w-[55ch] opacity-90">{CARDS[heroIndex].sub}</p>
          <div className="mt-4 flex gap-3">
            <button className="rounded-full bg-[#DC143C] px-5 py-3 font-bold text-white shadow-[0_16px_30px_rgba(220,20,60,.25)]">
              Get a Quote
            </button>
            <button className="rounded-full border border-white/20 bg-white/10 px-5 py-3 font-bold text-white">
              Learn More
            </button>
          </div>
        </div>
      </div>
    </section>
  );
}