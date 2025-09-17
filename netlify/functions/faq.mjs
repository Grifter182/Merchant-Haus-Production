// netlify/functions/faq.mjs
import { GoogleGenerativeAI } from "@google/generative-ai";

const corsHeaders = {
  "Access-Control-Allow-Origin": "*", // tighten to your domain in prod
  "Access-Control-Allow-Methods": "POST, OPTIONS",
  "Access-Control-Allow-Headers": "Content-Type, Authorization",
};

export async function handler(event) {
  if (event.httpMethod === "OPTIONS") {
    return { statusCode: 200, headers: corsHeaders, body: "" };
  }

  if (event.httpMethod !== "POST") {
    return { statusCode: 405, headers: corsHeaders, body: "Method Not Allowed" };
  }

  try {
    if (!process.env.GEMINI_API_KEY) {
      return {
        statusCode: 500,
        headers: corsHeaders,
        body: JSON.stringify({ error: "Missing GEMINI_API_KEY" }),
      };
    }

    const { question, context } = JSON.parse(event.body || "{}");
    if (!question || typeof question !== "string") {
      return {
        statusCode: 400,
        headers: corsHeaders,
        body: JSON.stringify({ error: "Missing 'question' string in body." }),
      };
    }

    const genAI = new GoogleGenerativeAI(process.env.GEMINI_API_KEY);
    const model = genAI.getGenerativeModel({ model: "gemini-1.5-flash" });

    const prompt = `
You are a concise FAQ assistant. Answer from the provided FAQ context only.
If the answer isn't present, say you don't know and suggest contacting support.

Context:
${context || "No extra context provided."}

Question: ${question}
    `.trim();

    const result = await model.generateContent(prompt);
    const text = result.response.text(); // fixed: direct call

    return {
      statusCode: 200,
      headers: { "Content-Type": "application/json", ...corsHeaders },
      body: JSON.stringify({ answer: text }),
    };
  } catch (err) {
    console.error("FAQ function error:", err);
    return {
      statusCode: 500,
      headers: corsHeaders,
      body: JSON.stringify({ error: "Server error", details: String(err?.message || err) }),
    };
  }
}
