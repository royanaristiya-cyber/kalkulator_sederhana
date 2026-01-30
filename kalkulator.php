<?php
$result = "";

if (isset($_POST['expr'])) {
    $expr = $_POST['expr'];
    // filter aman
    $expr = preg_replace('/[^0-9+\-*\/().%]/', '', $expr);

    try {
        eval('$result = ' . $expr . ';');
    } catch (Throwable $e) {
        $result = "Error";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Kalkulator Sederhana</title>

<style>
body{
    background:#f1f3f4;
    font-family: Arial, sans-serif;
}

/* container */
.calculator{
    width:340px;
    margin:40px auto;
    background:#fff;
    border-radius:24px;
    padding:16px;
    box-shadow:0 10px 25px rgba(0,0,0,.12);
}

/* display */
#display{
    width:100%;
    height:64px;
    font-size:30px;
    border:none;
    text-align:right;
    padding-right:10px;
    margin-bottom:12px;
}

/* grid */
.buttons{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:10px;
}

/* base button */
button{
    height:52px;
    border-radius:26px;
    border:none;
    font-size:18px;
    cursor:pointer;
}

/* number */
.num{
    background:#f1f3f4;
}

/* operator kanan */
.op{
    background:#d2e3fc;
    color:#1967d2;
    font-weight:bold;
}

/* top function */
.func{
    background:#e8f0fe;
    color:#1967d2;
}

/* equal */
.equal{
    background:#1a73e8;
    color:white;
    font-size:20px;
}

/* hover */
button:hover{
    filter:brightness(0.95);
}
</style>
</head>

<body>

<div class="calculator">
<form method="post">

<input type="text" id="display" name="expr"
       value="<?= htmlspecialchars($result ?: '0') ?>" readonly>

<div class="buttons">

    <!-- row 1 -->
    <button type="button" class="func" onclick="add('(')">(</button>
    <button type="button" class="func" onclick="add(')')">)</button>
    <button type="button" class="func" onclick="add('%')">%</button>
    <button type="button" class="func" onclick="clearDisplay()">AC</button>

    <!-- row 2 -->
    <button type="button" class="num" onclick="add('7')">7</button>
    <button type="button" class="num" onclick="add('8')">8</button>
    <button type="button" class="num" onclick="add('9')">9</button>
    <button type="button" class="op" onclick="add('/')">÷</button>

    <!-- row 3 -->
    <button type="button" class="num" onclick="add('4')">4</button>
    <button type="button" class="num" onclick="add('5')">5</button>
    <button type="button" class="num" onclick="add('6')">6</button>
    <button type="button" class="op" onclick="add('*')">×</button>

    <!-- row 4 -->
    <button type="button" class="num" onclick="add('1')">1</button>
    <button type="button" class="num" onclick="add('2')">2</button>
    <button type="button" class="num" onclick="add('3')">3</button>
    <button type="button" class="op" onclick="add('-')">−</button>

    <!-- row 5 -->
    <button type="button" class="num" onclick="add('0')">0</button>
    <button type="button" class="num" onclick="add('.')">.</button>
    <button type="submit" class="equal">=</button>
    <button type="button" class="op" onclick="add('+')">+</button>

</div>
</form>
</div>

<script>
function add(v){
    const d = document.getElementById("display");
    if(d.value === "0") d.value = "";
    d.value += v;
}
function clearDisplay(){
    document.getElementById("display").value = "0";
}
</script>

</body>
</html>
