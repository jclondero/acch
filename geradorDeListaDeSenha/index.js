var fs = require('fs');

const passlist = './passlist.txt';
const info = './info.txt';

try {
  if (fs.existsSync(passlist)) {
    fs.unlink(passlist, function (err) {
      if (err) throw err;
      console.log('File deleted!');
    });
  }
  fs.readFile(info, 'utf8', function (err, data) {
    let dados = data.split('\n');
    for(let i = 0; i < dados.length; i++){
      let dadoChave = dados[i].toLowerCase();
      dadoChave = dadoChave.replace(" ","");
      for(let j = 0; j < dados.length; j++){
        if(i != j) {
          let dadoAux = dados[j].toLowerCase();
          dadoAux = dadoAux.replace(" ","");
          let word = dadoChave+dadoAux+"\n";
          fs.appendFile(passlist, word, function (err) {
            if (err) throw err;
            console.log('Saved!');
          });
        }
      }
    }
  });
} catch(err) {
  console.error(err)
}