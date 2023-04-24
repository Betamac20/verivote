const mysql = require("mysql");
const jwt = require("jsonwebtoken");
const dotenv = require("dotenv");
const crypto  = require("crypto");


dotenv.config({ path: './.env' });

const db = mysql.createConnection({
    host: process.env.DB_HOST,
    user: process.env.DB_USERNAME,
    password: process.env.DB_PASSWORD,
    database: process.env.DB_DATABASE
});

// db.connect((err) => {
//   if (err) {
//       console.log(err);
//   } else {
//       console.log("Database Connected")
//   }
// })

// // header
// const header = {
//     "algorithm": "ES256"
// };

const id_number = "K1143179";


db.query('SELECT position, candidate_name, id_number, name, department, election_id, candidate_role FROM vote_histories WHERE id_number = ?', [id_number],  async (err, result) => {
  if(err) {
      console.log(err);
    }
    // const position = "President"
    // db.query('SELECT * FROM vote_histories WHERE id_number = ?, position = ?', [id_number, position],  async (err, result) => {
    
    //   for (i=0; i<result.length; i++) {
        

      
    //   }
    
    
    // });

    db.query('SELECT * FROM vote_histories WHERE id_number = ? GROUP BY id_number', [id_number],  async (err, groupbyID) => {
      if(err) {
          console.log(err);
        }
            // const email = groupbyID[0].email;
            const id_number = groupbyID[0].id_number;
            const name = groupbyID[0].name;
            const candidate_id_number = groupbyID[0].candidate_id_number;
            const candidate_name = groupbyID[0].candidate_name;

            const payload = {
              id_number:id_number,
              name:name,
              candidate_id_number: candidate_id_number,
              candidate_name: candidate_name,
            }


              for(i=0; i< result.length; i++)
                {

                  const payload = {
                    voters_id_number:id_number,
                    voters_name:name,
                    selected_candidate_info: {
                      candidate_id_number: result[i].candidate_id_number,
                      [result[i].position]:result[i].candidate_name
                    }
                  }

                  // console.log(payload)
                }

                db.query('SELECT position, candidate_name FROM vote_histories WHERE id_number = ?', [id_number],  async (err, result) => {
                const loads = {
                   id_number: result[0].id_number
                }

                console.log(loads);
              });
    });
});

// // payload

  

  // const token = jwt.sign(payload, pri, {
  //     algorithm: 'ES256',
  //     });

  //  const verify = jwt.verify(token, publicKey, {algorithm: 'ES256'});

    //   console.log(token);

//   db.query('SELECT * FROM table_keys ',  async (err, result) => {
//     if(err) {
//         console.log(err);
//       }

//       for (i=0; i<result.length; i++) {
//         console.log("\n"+result[i].private_key);
//       }

// });