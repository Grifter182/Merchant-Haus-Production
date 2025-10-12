import React, { useEffect, useMemo, useRef, useState } from "react";
import { motion, AnimatePresence, useReducedMotion, useMotionValue, useSpring } from "framer-motion";
import { Lock, BarChart3, Zap } from "lucide-react";

/**
 * Hero + Services
 * - 3-line rotating headline
 * - Typewriter body
 * - CTA pill
 * - Services rail: 5 visible, N rotate, 10s cadence
 * - Arrows LG+ only, overlayed at right of rail
 * - Cards anchored to bottom, 3:4, <= ~1/3 section height
 * - Divider pill straddles seam, no grey band
 */

const TOKENS = {
  noun: [
    "flexibility",
    "control",
    "independence",
    "advantage",
    "capability",
    "empowerment",
    "agility",
    "opportunity",
    "simplicity",
    "confidence",
  ],
  verb: [
    "fuels",
    "drives",
    "accelerates",
    "ignites",
    "propels",
    "enables",
    "supports",
    "advances",
    "amplifies",
    "energizes",
  ],
  object: [
    "momentum",
    "expansion",
    "business",
    "performance",
    "progress",
    "potential",
    "future",
    "scalability",
    "revenue",
  ],
} as const;

function pickNextIndex(prev: number, len: number): number {
  if (len <= 1) return 0;
  let next = Math.floor(Math.random() * len);
  if (next === prev) next = (prev + 1) % len;
  return next;
}

function capitalizeFirst(s: string): string {
  if (!s) return s;
  return s.charAt(0).toUpperCase() + s.slice(1);
}

export default function HeroAndServices() {
  return (
    <>
      <Hero />
      <SectionDividerPill
        title="Payments Services"
        subtitle="Everything you need, nothing you don't."
        alignHalfOverlap
      />
      <ServicesSection />
    </>
  );
}

/* -------------------- Hero -------------------- */

function Hero() {
  const reduceMotion = useReducedMotion();
  return (
    <section
      aria-label="Hero: Payment Headline"
      className="relative isolate min-h-[85vh] w-full overflow-hidden bg-gradient-to-br from-[#1A1A1A] to-[#0f0f10] text-white"
    >
      <div className="relative z-10 mx-auto flex max-w-7xl flex-col gap-12 px-6 py-20 md:flex-row md:items-center md:justify-between lg:px-10 lg:py-28">
        {/* Left: text */}
        <motion.div
          className="max-w-2xl"
          initial={reduceMotion ? undefined : { opacity: 0, y: 20 }}
          animate={reduceMotion ? undefined : { opacity: 1, y: 0 }}
          transition={{ duration: 0.8, delay: 0.2 }}
        >
          <TiltTitle reduceMotion={reduceMotion}>
            <TripleTicker reduceMotion={reduceMotion} />
          </TiltTitle>

          <BenefitsRow reduceMotion={reduceMotion} />

          <div className="mt-6 max-w-[600px] text-[18px] leading-relaxed text-gray-200">
            <TypewriterText
              reduceMotion={reduceMotion}
              text="Create your business profile in minutes and start accepting cards, ACH, and secure pay links — online, in-store, or on the go. Reduce costs, onboard quickly, and safeguard every transaction with advanced fraud protection and chargeback defense."
            />
          </div>

          <motion.button
            aria-label="Get started with NMI"
            className="mt-8 inline-flex items-center justify-center rounded-full border border-white/90 px-7 py-3 font-semibold text-white"
            initial={reduceMotion ? undefined : { opacity: 0, y: 24 }}
            animate={reduceMotion ? undefined : { opacity: 1, y: 0 }}
            transition={{ delay: 1.0, duration: 0.8 }}
            whileHover={reduceMotion ? undefined : { backgroundColor: "#00CEDB", color: "#000", scale: 1.02 }}
            whileTap={reduceMotion ? undefined : { scale: 0.98 }}
          >
            Get Started
          </motion.button>
        </motion.div>

        {/* Right: 3 conceptual cards */}
        <motion.div className="relative w-full max-w-xl md:w-1/2">
          <ThreeIdeaShowcase reduceMotion={reduceMotion} />
        </motion.div>
      </div>
    </section>
  );
}

function TiltTitle({
  reduceMotion,
  children,
}: {
  reduceMotion: boolean;
  children: React.ReactNode;
}) {
  const baseRX = 0;
  const baseRY = 0;
  const maxTilt = 6;
  const rx = useMotionValue<number>(baseRX);
  const ry = useMotionValue<number>(baseRY);
  const srx = useSpring(rx, { stiffness: 200, damping: 20, mass: 0.9 });
  const sry = useSpring(ry, { stiffness: 200, damping: 20, mass: 0.9 });

  const onPointerMove: React.PointerEventHandler<HTMLHeadingElement> = (e) => {
    if (reduceMotion) return;
    const rect = e.currentTarget.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;
    const cx = rect.width / 2;
    const cy = rect.height / 2;
    const nx = (x - cx) / (rect.width / 2);
    const ny = (cy - y) / (rect.height / 2);
    const clampedX = Math.max(-1, Math.min(1, nx));
    const clampedY = Math.max(-1, Math.min(1, ny));
    rx.set(baseRX + clampedY * maxTilt);
    ry.set(baseRY + clampedX * maxTilt);
  };
  const onPointerLeave = () => {
    rx.set(baseRX);
    ry.set(baseRY);
  };

  const titleStyle: React.CSSProperties & any = {
    fontFamily:
      "Ubuntu, system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif",
    transformStyle: "preserve-3d",
    touchAction: reduceMotion ? undefined : "none",
    rotateX: reduceMotion ? baseRX : srx,
    rotateY: reduceMotion ? baseRY : sry,
    transformPerspective: 1200,
  };

  return (
    <div className="[perspective:1200px]">
      <motion.h1
        className="tracking-tight text-white font-semibold text-left"
        style={titleStyle}
        onPointerMove={onPointerMove}
        onPointerLeave={onPointerLeave}
        onFocus={onPointerLeave}
        initial={reduceMotion ? undefined : { opacity: 0, y: 16 }}
        animate={{ opacity: 1, y: 0 }}
        transition={{ duration: 0.8, delay: 0.2 }}
      >
        {children}
      </motion.h1>
    </div>
  );
}

function TypewriterText({ text, reduceMotion }: { text: string; reduceMotion: boolean }) {
  const [shown, setShown] = useState(reduceMotion ? text : "");
  useEffect(() => {
    if (reduceMotion) return;
    let i = 0;
    let id: any;
    const step = () => {
      i += 1;
      setShown(text.slice(0, i));
      if (i < text.length) id = setTimeout(step, 14);
    };
    id = setTimeout(step, 300);
    return () => clearTimeout(id);
  }, [text, reduceMotion]);
  return <p aria-live="polite">{shown}</p>;
}

function TripleTicker({ reduceMotion }: { reduceMotion: boolean }) {
  const [iNoun, setINoun] = useState(0);
  const [iVerb, setIVerb] = useState(0);
  const [iObj, setIObj] = useState(0);

  useEffect(() => {
    if (reduceMotion) return;
    let idMain: any, idV: any, idO: any;
    const tick = () => {
      setINoun((prev) => pickNextIndex(prev, TOKENS.noun.length));
      idV = setTimeout(
        () => setIVerb((prev) => pickNextIndex(prev, TOKENS.verb.length)),
        150
      );
      idO = setTimeout(
        () => setIObj((prev) => pickNextIndex(prev, TOKENS.object.length)),
        300
      );
      idMain = setTimeout(tick, 7000);
    };
    idMain = setTimeout(tick, 4000);
    return () => {
      clearTimeout(idMain);
      clearTimeout(idV);
      clearTimeout(idO);
    };
  }, [reduceMotion]);

  return (
    <div className="flex flex-col gap-1">
      <div
        className="flex items-baseline gap-3 leading-[1.03] text-left"
        style={{ fontSize: "clamp(52px, 8vw, 80px)" }}
      >
        <span>Payment</span>
        <TokenTicker
          words={TOKENS.noun}
          index={iNoun}
          tint="#DC143C"
          reduceMotion={reduceMotion}
        />
      </div>
      <div className="leading-tight" style={{ fontSize: "clamp(30px, 5vw, 48px)" }}>
        <span className="mr-2">That</span>
        <TokenTicker
          words={TOKENS.verb}
          index={iVerb}
          tint="#00CEDB"
          reduceMotion={reduceMotion}
        />
      </div>
      <div className="leading-tight" style={{ fontSize: "clamp(30px, 5vw, 48px)" }}>
        <span className="mr-2">Your</span>
        <TokenTicker
          words={TOKENS.object}
          index={iObj}
          tint="#F2C94C"
          reduceMotion={reduceMotion}
        />
      </div>
    </div>
  );
}

function TokenTicker({
  words,
  index,
  tint,
  reduceMotion,
}: {
  words: readonly string[];
  index: number;
  tint?: string;
  reduceMotion: boolean;
}) {
  const maxCh = useMemo(
    () => words.reduce((m, w) => Math.max(m, w.length), 0),
    [words]
  );
  const current = useMemo(() => words[index], [words, index]);
  const title = useMemo(() => capitalizeFirst(current), [current]);
  return (
    <span
      className="relative inline-flex align-baseline overflow-hidden"
      style={{ height: "1em", minWidth: `${maxCh + 1}ch`, width: `${maxCh + 1}ch` }}
    >
      <AnimatePresence initial={false} mode="popLayout">
        <motion.span
          key={title}
          initial={reduceMotion ? undefined : { y: "100%", opacity: 0 }}
          animate={{ y: 0, opacity: 1 }}
          exit={reduceMotion ? undefined : { y: "-100%", opacity: 0 }}
          transition={{ duration: 0.6, ease: "easeInOut" }}
          className="inline-block capitalize"
          style={{ color: tint, lineHeight: 1 }}
          aria-live="polite"
        >
          {title}
        </motion.span>
      </AnimatePresence>
    </span>
  );
}

function BenefitsRow({ reduceMotion }: { reduceMotion: boolean }) {
  const ITEMS = [
    { key: "speed", label: "Speed.", Icon: Zap },
    { key: "security", label: "Security.", Icon: Lock },
    { key: "scale", label: "Scale.", Icon: BarChart3 },
  ];
  return (
    <div
      className="mt-4 flex flex-wrap items-center gap-6"
      aria-label="Key benefits: Speed, Security, Scale"
    >
      {ITEMS.map(({ key, label, Icon }, i) => (
        <motion.div
          key={key}
          className="group relative flex items-center gap-2 text-white"
          initial={reduceMotion ? undefined : { opacity: 0, y: 10 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ delay: 0.2 + i * 0.15, duration: 0.6, ease: "easeOut" }}
          role="listitem"
        >
          <span className="inline-flex h-8 w-8 items-center justify-center">
            <Icon aria-hidden className="h-5 w-5" />
          </span>
          <span className="font-bold" style={{ fontSize: "clamp(24px, 3.2vw, 36px)" }}>
            {label}
          </span>
        </motion.div>
      ))}
    </div>
  );
}

/* ------------- Concept cards shown to the right of hero ------------- */

function ThreeIdeaShowcase({ reduceMotion }: { reduceMotion: boolean }) {
  return (
    <div className="relative z-10 grid w-full max-w-2xl grid-cols-1 gap-4 md:grid-cols-3 overflow-visible">
      <IdeaCard title="Real-time Flow" subtitle="Auth → Settle → Payout" reduceMotion={reduceMotion}>
        <FlowLines reduceMotion={reduceMotion} />
      </IdeaCard>
      <IdeaCard title="Gateway Mesh" subtitle="Terminals • APIs • Wallets" reduceMotion={reduceMotion}>
        <NodeMesh reduceMotion={reduceMotion} />
      </IdeaCard>
      <IdeaCard title="Live KPIs" subtitle="Latency • Approval • Volume" reduceMotion={reduceMotion}>
        <KPIMeters reduceMotion={reduceMotion} />
      </IdeaCard>
    </div>
  );
}

function IdeaCard({
  title,
  subtitle,
  children,
  reduceMotion,
}: {
  title: string;
  subtitle?: string;
  children: React.ReactNode;
  reduceMotion: boolean;
}) {
  const baseRX = 2;
  const baseRY = -2;
  const maxTilt = 12;

  const rx = useMotionValue<number>(baseRX);
  const ry = useMotionValue<number>(baseRY);
  const srx = useSpring(rx, { stiffness: 200, damping: 20, mass: 0.8 });
  const sry = useSpring(ry, { stiffness: 200, damping: 20, mass: 0.8 });

  const handlePointerMove: React.PointerEventHandler<HTMLDivElement> = (e) => {
    if (reduceMotion) return;
    const rect = e.currentTarget.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;
    const cx = rect.width / 2;
    const cy = rect.height / 2;
    const nx = (x - cx) / (rect.width / 2);
    const ny = (cy - y) / (rect.height / 2);
    const clampedX = Math.max(-1, Math.min(1, nx));
    const clampedY = Math.max(-1, Math.min(1, ny));
    rx.set(baseRX + clampedY * maxTilt);
    ry.set(baseRY + clampedX * maxTilt);
  };

  const handlePointerLeave = () => {
    rx.set(baseRX);
    ry.set(baseRY);
  };

  const cardStyle: React.CSSProperties & any = {
    transformStyle: "preserve-3d",
    transformPerspective: 1200,
    rotateX: reduceMotion ? baseRX : srx,
    rotateY: reduceMotion ? baseRY : sry,
    touchAction: reduceMotion ? undefined : "none",
  };

  return (
    <div className="group [perspective:1200px]" role="figure" aria-label={title}>
      <motion.div
        className="rounded-2xl bg-white/5 p-4 shadow-2xl ring-1 ring-white/10 backdrop-blur will-change-transform"
        style={cardStyle}
        onPointerMove={handlePointerMove}
        onPointerLeave={handlePointerLeave}
        onFocus={handlePointerLeave}
        initial={reduceMotion ? undefined : { opacity: 0, y: 16 }}
        whileInView={reduceMotion ? undefined : { opacity: 1, y: 0 }}
        viewport={{ once: true, amount: 0.3 }}
        transition={{ duration: 0.6, ease: "easeOut" }}
        whileHover={
          reduceMotion ? undefined : { z: 16, scale: 1.02, boxShadow: "0 20px 40px rgba(0,0,0,0.35)" }
        }
        tabIndex={0}
      >
        <div className="mb-2 text-sm text-white/80">{title}</div>
        {subtitle && <div className="mb-3 text-xs text-white/60">{subtitle}</div>}
        <div style={{ transform: "translateZ(1px)" }}>{children}</div>
      </motion.div>
    </div>
  );
}

function FlowLines({ reduceMotion }: { reduceMotion: boolean }) {
  return (
    <svg viewBox="0 0 220 120" className="h-28 w-full">
      {[0, 1, 2].map((row) => (
        <motion.path
          key={row}
          d={`M10 ${30 + row * 25} C 70 ${10 + row * 25}, 150 ${50 + row * 15}, 210 ${20 + row * 25}`}
          stroke="rgba(255,255,255,0.6)"
          strokeWidth="2"
          fill="none"
          initial={reduceMotion ? undefined : { pathLength: 0 }}
          animate={reduceMotion ? { pathLength: 1 } : { pathLength: [0, 1] }}
          transition={{ duration: 1.2 + row * 0.2, ease: "easeInOut", repeat: reduceMotion ? 0 : Infinity, repeatDelay: 1.8 }}
        />
      ))}
    </svg>
  );
}

function NodeMesh({ reduceMotion }: { reduceMotion: boolean }) {
  const nodes = useMemo(
    () => Array.from({ length: 8 }).map((_, i) => ({ id: i, x: 20 + Math.random() * 180, y: 20 + Math.random() * 80 })),
    []
  );
  return (
    <svg viewBox="0 0 220 120" className="h-28 w-full">
      {nodes.map((a, i) =>
        nodes.slice(i + 1).map((b) => (
          <motion.line
            key={`${a.id}-${b.id}`}
            x1={a.x}
            y1={a.y}
            x2={b.x}
            y2={b.y}
            stroke="rgba(255,255,255,0.18)"
            initial={reduceMotion ? undefined : { opacity: 0 }}
            animate={{ opacity: 1 }}
            transition={{ duration: 0.6, delay: 0.05 * i }}
          />
        ))
      )}
      {nodes.map((n, i) => (
        <motion.circle
          key={n.id}
          cx={n.x}
          cy={n.y}
          r={4}
          fill="rgba(0,206,219,0.8)"
          initial={reduceMotion ? undefined : { scale: 0.8, opacity: 0 }}
          animate={{ scale: 1, opacity: 1 }}
          transition={{ duration: 0.4, delay: 0.05 * i }}
        />
      ))}
    </svg>
  );
}

function KPIMeters({ reduceMotion }: { reduceMotion: boolean }) {
  return (
    <div className="grid grid-cols-3 gap-3 text-center text-white/90 min-h-[96px]" role="group" aria-label="Live KPIs (placeholders)">
      <KPIPlaceholder label="Latency" suffix="ms" />
      <KPIPlaceholder label="Approval" suffix="%" />
      <KPIPlaceholder label="Volume" suffix="k" />
    </div>
  );
}

function KPIPlaceholder({ label, suffix }: { label: string; suffix?: string }) {
  const widthCh = (suffix ?? "").length + 2;
  return (
    <div className="rounded-2xl p-3 [background:rgba(0,0,0,0.4)] min-h-[84px]">
      <div className="text-xs text-white/60">{label}</div>
      <div
        className="mt-1 inline-flex items-center justify-center rounded-md border border-white/20 px-3 py-2 text-white/60 font-mono"
        style={{ minWidth: `${widthCh}ch` }}
        aria-label={`${label} placeholder`}
      >
        —{suffix ? ` ${suffix}` : ""}
      </div>
    </div>
  );
}

/* -------------------- Divider Pill -------------------- */

function SectionDividerPill({
  title,
  subtitle,
  alignHalfOverlap,
}: {
  title: string;
  subtitle?: string;
  alignHalfOverlap?: boolean;
}) {
  const wrapperClass = alignHalfOverlap
    ? "relative z-30 -mt-24 mb-0 flex w-full justify-center pointer-events-none"
    : "relative z-30 my-4 flex w-full justify-center pointer-events-none";
  const innerClass =
    "inline-flex transform -translate-y-1/2 flex-col items-center rounded-full border border-white/40 bg-transparent px-6 py-3";
  return (
    <div className={wrapperClass}>
      <div className={innerClass}>
        <span
          className="font-semibold text-white drop-shadow-[0_1px_0_rgba(0,0,0,0.5)]"
          style={{
            fontFamily:
              "Ubuntu, system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif",
            fontSize: "clamp(1.35rem,2.8vw,2.2rem)",
          }}
        >
          {title}
        </span>
        {subtitle && (
          <span className="text-sm text-white/90 drop-shadow-[0_1px_0_rgba(0,0,0,0.4)]">
            {subtitle}
          </span>
        )}
      </div>
    </div>
  );
}

/* -------------------- Services Section -------------------- */

function ServicesSection() {
  const reduceMotion = useReducedMotion();
  const cardsRef = useRef<HTMLDivElement | null>(null);
  const [heroIndex, setHeroIndex] = useState(0);

  // Swap in your 10 cards here:
  const CARDS = [
    { title: "Payments Anywhere & Everywhere", sub: "Accept cards, ACH and contactless. POS, mobile and online — unified and secure.", img: "/assets/omg/Card1land.webp" },
    { title: "AI-Powered Fraud Detection",    sub: "Leverage machine learning to protect your business and your customers.",          img: "/assets/omg/Card2land.webp" },
    { title: "Seamless Mobile Commerce",       sub: "Empower your sales on the go with our robust mobile payment solutions.",         img: "/assets/omg/Card3land.webp" },
    { title: "Flexible Payment Options",       sub: "From credit cards to ACH and checks, we've got all your payment needs covered.", img: "/assets/omg/Card4land.webp" },
    { title: "Hundreds of Integrations",       sub: "Connect with the tools you already use to streamline your entire workflow.",      img: "/assets/omg/Card5land.webp" },
    { title: "Advanced Point of Sale",         sub: "Modernize your in-person transactions with our powerful POS systems.",            img: "/assets/omg/Card6land.webp" },
  ];

  const numCards = CARDS.length;

  const scrollToCard = (idx: number) => {
    const viewport = cardsRef.current; if (!viewport) return;
    const el = viewport.children[idx] as HTMLElement | undefined; if (!el) return;
    const left = el.offsetLeft - viewport.offsetWidth / 2 + el.offsetWidth / 2;
    viewport.scrollTo({ left, behavior: "smooth" });
  };

  const updateState = (newHero: number) => {
    setHeroIndex(newHero);
    requestAnimationFrame(() => scrollToCard((newHero + 1) % numCards));
  };

  const move = (dir: number) => updateState((heroIndex + dir + numCards) % numCards);
  const clickCard = (idx: number) => {
    const newHero = (idx - 1 + numCards) % numCards;
    if (newHero !== heroIndex) updateState(newHero);
  };

  useEffect(() => {
    if (reduceMotion) return;
    let paused = false;
    let id: number | null = null;
    const tick = () => { if (!paused) move(1); id = window.setTimeout(tick, 10000); };
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

  useEffect(() => { updateState(0); /* initialize */ }, []);

  return (
    <section className="relative isolate -mt-6 w-full overflow-hidden bg-[#0f0f10] text-white">
      {/* Background crossfade for text side */}
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

      <div className="relative z-10 mx-auto grid min-h-[86svh] max-w-7xl grid-cols-1 gap-8 px-6 pt-14 pb-8 lg:grid-cols-2 lg:items-stretch lg:gap-12 lg:px-10 lg:pt-20">
        {/* LEFT: rail (anchored to bottom) */}
        <div className="order-1 lg:order-1 flex flex-col lg:pl-4">
          <div className="mt-auto pb-5 md:pb-6">
            <div className="relative min-h-[28vh]">
              <div
                ref={cardsRef}
                className="flex w-full items-end gap-4 overflow-x-hidden overflow-y-visible scroll-smooth pr-14 lg:pr-24"
                aria-label="Services cards"
                style={{ ["--cards-visible" as any]: "5" }}
              >
                {CARDS.map((c, idx) => (
                  <button
                    key={c.title}
                    onClick={() => clickCard(idx)}
                    className={[
                      "relative aspect-[3/4] flex-[0_0_auto] rounded-2xl bg-[#222] bg-cover bg-center shadow-2xl ring-1 ring-white/10 transition-transform duration-200",
                      "hover:scale-[1.03]",
                      ((heroIndex + 1) % numCards) === idx ? "outline outline-2 outline-offset-2 outline-[#00CEDB]" : "",
                    ].join(" ")}
                    style={{
                      backgroundImage: `url(${c.img})`,
                      width: "clamp(140px, calc((100% - (var(--cards-visible,5) - 1) * 1rem) / var(--cards-visible,5)), 220px)",
                      maxHeight: "28vh",
                      alignSelf: "flex-end",
                    }}
                    aria-label={`${c.title} card`}
                  >
                    <span className="sr-only">{c.title}</span>
                  </button>
                ))}
              </div>

              {/* Arrows (LG+) */}
              <div className="pointer-events-none absolute inset-y-0 right-0 hidden lg:flex items-center justify-end">
                <div className="pointer-events-auto flex gap-2">
                  <button onClick={() => move(-1)} className="h-11 w-11 rounded-full border border-white/30 bg-white/10 text-white">◀</button>
                  <button onClick={() => move(1)}  className="h-11 w-11 rounded-full border border-white/30 bg-white/10 text-white">▶</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        {/* RIGHT: text + CTAs */}
        <div className="order-2 lg:order-2 relative flex flex-col items-start text-left">
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
            <button className="rounded-full bg-[var(--brand-crimson,#DC143C)] px-5 py-3 font-bold text-white shadow-[0_16px_30px_rgba(220,20,60,.25)]">
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
