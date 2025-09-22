exports.handler = async (event) => {
  // Verification token value
  const VERIFICATION_TOKEN = '0YA5757hbasBozeVX2';

  // Check for token in header
  const token = event.headers['x-verification-token'];
  if (token !== VERIFICATION_TOKEN) {
    return {
      statusCode: 403,
      body: JSON.stringify({ error: 'Forbidden: Invalid verification token' })
    };
  }

  // Parse incoming data
  let data;
  try {
    data = JSON.parse(event.body || '{}');
  } catch (err) {
    return {
      statusCode: 400,
      body: JSON.stringify({ error: 'Invalid JSON' })
    };
  }

  // Example: echo the message back
  const message = data.message || '';
  const reply = `You said: ${message}`;

  // You can add your chatbot logic here

  return {
    statusCode: 200,
    body: JSON.stringify({ reply })
  };
};
