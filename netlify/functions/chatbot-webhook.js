exports.handler = async (event) => {
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
