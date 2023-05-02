<!DOCTYPE html>
<?php ?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/tailwind.css">
    <link rel="stylesheet" href="assets/css/personal.css">
</head>
<body class=" skay">
    <header class=" fixed w-full overflow-hidden pt-8 pb-4 top-0 bg-blue-800  flex justify-center">
        <form action="/" method="get">
            <div class="flex flex-col content-center relative">
                <label for="yar" class="absolute -top-7 left-1/2 -translate-x-1/2 text-2xl text-white">ano</label>
                <div class="flex items-center gap-4">
                    <button class="h-8 w-8 bg-transparent border-white border-t-8 border-l-8 origin-center -rotate-45  border-solid rounded-md"></button>
                    <input type="number" min="1900" max="2199" value="<?= $yar;?>" name="yar" id="yar" class="py-1 px-2 rounded-md text-center text-2xl">
                    <button class="h-8 w-8 bg-transparent border-white border-t-8 border-r-8 origin-center rotate-45  border-solid rounded-md"></button>
                </div>
            </div>
        </form>

    </header>

<main class="grid sm:grid-cols-3 sm:grid-row-4 max-w-7xl mx-auto gap-x-8 gap-y-16 ">
    <?php 
        for($i = 0; $i < 12; $i++){
                $name =  $meses[$i][0];
                $wd = printMes($wd, $meses[$i][1],$name);
        };
            
    ?>
</main>

</body>
</html>