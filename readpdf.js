const fs = require('fs');
const pdf = require('pdf-parse');

(async () => {
  const data = await pdf(fs.readFileSync('C:/Users/ADMIN/Downloads/Karni_Laravel_Backend.pdf'));
  console.log(data.text);
})();
