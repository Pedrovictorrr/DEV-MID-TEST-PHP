<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .calculator {
            margin: 20px auto;
            width: 200px;
            padding: 10px;
            border: 1px solid #ccc;
        }

        .button {
            width: 40px;
            height: 40px;
            margin: 2px;
            font-size: 18px;
            cursor: pointer;
            border: 1px solid #ccc;
            background-color: #f0f0f0;
        }

        .button:hover {
            background-color: #e0e0e0;
        }

        .result {
            font-size: 20px;
            border: 1px solid #ccc;
            padding: 5px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <div class="result" id="display">0</div>
        <div>
            <button class="button" onclick="clearDisplay()">C</button>
            <button class="button" onclick="appendToDisplay('/')">&#247;</button>
        </div>
        <div>
            <button class="button" onclick="appendToDisplay('7')">7</button>
            <button class="button" onclick="appendToDisplay('8')">8</button>
            <button class="button" onclick="appendToDisplay('9')">9</button>
            <button class="button" onclick="appendToDisplay('*')">*</button>
        </div>
        <div>
            <button class="button" onclick="appendToDisplay('4')">4</button>
            <button class="button" onclick="appendToDisplay('5')">5</button>
            <button class="button" onclick="appendToDisplay('6')">6</button>
            <button class="button" onclick="appendToDisplay('-')">-</button>
        </div>
        <div>
            <button class="button" onclick="appendToDisplay('1')">1</button>
            <button class="button" onclick="appendToDisplay('2')">2</button>
            <button class="button" onclick="appendToDisplay('3')">3</button>
            <button class="button" onclick="appendToDisplay('+')">+</button>
        </div>
        <div>
            <button class="button" onclick="appendToDisplay('0')">0</button>
            <button class="button" onclick="appendToDisplay('.')">.</button>
            <button class="button" onclick="calculate()">=</button>
        </div>
    </div>

    <script>
        // Função para enviar a operação para o servidor via AJAX
        function calculateOnServer() {
            const xhr = new XMLHttpRequest();
            const url = 'calculator'; // Substitua pela URL do seu servidor

            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        display.textContent = xhr.responseText;
                    } else {
                        display.textContent = 'Erro ao calcular';
                    }
                }
            };

            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.send(JSON.stringify({ calculation: calculation }));
        }

        // Substitua a função calculate() pelo calculateOnServer()
        function calculate() {
            try {
                calculateOnServer();
            } catch (error) {
                display.textContent = 'Erro';
            }
        }
    </script>
</body>
</html>