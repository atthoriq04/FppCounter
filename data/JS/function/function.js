function phpArray(rawData) {
  const data = rawData ? JSON.parse(rawData) : [];
  return data;
}

export { phpArray };
