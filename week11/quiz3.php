<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>รายชื่อ Staff</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap">

    <style>
        body {
            font-family: "Poppins", sans-serif;
            background-color: #f0f0f0;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }

        .box {
            position: relative;
            width: 28rem;
            height: 28rem;
            margin: 4rem;
        }

        .box:hover .imgBox {
            transform: translate(-3.5rem, -3.5rem);
        }

        .box:hover .content {
            transform: translate(3.5rem, 3.5rem);
        }

        .imgBox {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 2;
            transition: all 0.5s ease-in-out;
        }

        .imgBox img {
            width: 30rem;
            height: 30rem;
            object-fit: cover;
        }

        .content {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            padding: 1rem;
            display: flex;
            justify-content: center;
            background-color: #fff;
            z-index: 1;
            align-items: flex-end;
            text-align: center;
            transition: 0.5s ease-in-out;
        }

        .content h2 {
            font-size: 1.3rem;
            color: #111;
            font-weight: 500;
            line-height: 2rem;
            letter-spacing: -1px;
        }

        .content p {
            font-size: 10px;
            color: #111;
            margin-bottom: -0.5rem;
        }

        .content span {
            color: #555;
            font-size: 0.9rem;
            font-weight: 300;
            letter-spacing: 2px;
        }

        @media (max-width: 600px) {
            .box:hover .content {
                transform: translate(0, 3.5rem);
            }

            .box:hover .imgBox {
                transform: translate(0, -3.5rem);
            }
        }

        .additional-info {
            display: none;
            margin-top: 20px;
            letter-spacing: 1px;
        }

        .show-info-button {
            margin-top: 10px;
            cursor: pointer;
            color: #007bff;
            padding-left: 10px;
            letter-spacing: 1px;
        }
    </style>
</head>

<body>
    <h2 style="text-align: center;">List of STAFF</h2>
    <div class="container">
        <script>
            fetch('https://raw.githubusercontent.com/arc6828/SCS211/main/week13/staff.json')
                .then(response => response.json())
                .then(data => {

                    const staffListDiv = document.querySelector('.container');
                    data.people.forEach(person => {
                        const boxDiv = document.createElement('div');
                        boxDiv.classList.add('box');
                        boxDiv.innerHTML = `
          <div class="imgBox">
              <img src="${person.image}" alt="${person.name}">
            </div>
            <div class="content">
              <h2>${person.name}</h2>
              <span>${person.role}</span>
              <div class="additional-info">
                <p><strong>Education:</strong> ${person.education}</p>
                <p><strong>Email:</strong> ${person.email }</p>
                <p><strong>Phone:</strong> ${person.phone }</p>
              </div>
              <div class="show-info-button" onclick="toggleAdditionalInfo(this)">Show</div>
            </div>
          `;
                        staffListDiv.appendChild(boxDiv);
                    });
                });

            function toggleAdditionalInfo(button) {
                const additionalInfo = button.previousElementSibling;
                if (additionalInfo.style.display === 'none' || additionalInfo.style.display === '') {
                    additionalInfo.style.display = 'block';
                    button.innerText = ' Hide Info';
                } else {
                    additionalInfo.style.display = 'none';
                    button.innerText = 'Show Info';
                }
            }
        </script>
    </div>
</body>

</html>