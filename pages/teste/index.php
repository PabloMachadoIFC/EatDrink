    <?php $path = '../conf/conf.inc.php';
        if (file_exists($path))
        include_once($path);
        $path = '../../conf/conf.inc.php';
        if (file_exists($path))
        include_once($path);  
    ?>

    <style>
        .txtA{
            font-family: 'Open Sans', sans-serif;
            font-size: clamp(20px,9vw,5px);
        }
        .fLaranja{
            background-color: #F67B30;
            color: white;
            
        }
        .fBrancoB{
            background-color: whitesmoke;
            color: black;
            margin-top: 1%;
        }
        .fBranco{
            background-color: white;
            color: black;
            margin-top: 2%;
            border-color: white;
            width: 100%;
            float: left;
            border-bottom: 0px;
        }
        .icon{
            float: left;
        }
        .iconA{
            float: center;
        }
        .center{
            float: center;
            text-align: center;
            position: center;
            background-color: white;
            color: black;
            margin-top: 2%;
            border-color: white;
            width: 100%;
            border-bottom: 0px;
            font-weight: bold;
        }
        .label1{
            margin-right: 6vw;
            font-weight: bold;
        }
        .label2{
            margin-right: 3.5vw;
            font-weight: bold;
        }
        .label3{
            margin-right: 7vw;
            font-weight: bold;
        }
        .label4{
            margin-right: 4vw;
            font-weight: bold;
        }
        .body1{
            margin-top: 2vh;
            margin-left: 2vh;
            margin-right: 2vh;
            background-color: Gray;

            border-radius: 25px;
            line-height: 30px;
            padding: 0.7vh 20px;
            height: 25vh;
            width: 159vh;
        }
        .body2{
            margin-top: -5vh;
            margin-left: 2vh;
            margin-right: 2vh;
            background-color: DarkGray;

            border-radius: 25px;
            line-height: 30px;
            padding: 0.7vh 20px;
            height: 25vh;
            width: 159vh;

            
        }
        .body3{
            margin-top: -30vh;
            margin-left: 9vh;
            margin-right: 2vh;
            background-color: DimGray;

            border-radius: 25px;
            line-height: 30px;
            padding: 0.7vh 20px;
            height: 13vh;
            width: 13vh;
        }
        .textInput{
            margin-top: -6vh;
            margin-left: 25vh;
            /* margin-right: 2vh; */
        }
        .inputTextA{
            background-color: DarkGray;
            /* border-radius: 25px; */
            line-height: 30px;
            /* padding: 0.7vh 20px; */
            /* text-transform: uppercase; */
            font-weight: bold;
            color:black;
            border: 0px solid #F67300;
        }
        .linhaInputA{
            margin-top: -0vh;
            height: 13vh;
            width: 22vh;
        }
    </style>
        
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
    <body class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a class="navbar-brand" href="<?=URL_BASE.'index.php'?>"><img src="<?=URL_BASE.'assets/img/logoeatdrink.png'?>" alt="logo" width="15%" class="logo"></a>
            </div>

            <div class="col-2 fLaranja" style="height: 91vh;">
                <button class="fBranco"><img src="<?=URL_BASE.'assets/img/time.png'?>" alt="logo" width="10%" class="icon"><label class="label1">Pedido do Dia</label></button>

                <button class="fBranco"><img src="<?=URL_BASE.'assets/img/spatula.png'?>" alt="logo" width="8%" class="icon"><label class="label2">Pedidos na Cozinha</label></button>
                    
                    <br><br>

                <h5 class="txtA" style="color: black;">Analisar</h5>
                <button class="fBranco"><img src="<?=URL_BASE.'assets/img/time.png'?>" alt="logo" width="8%" class="icon"> <label class="label3">Inventario</label></button>

                    <br><br>

                <h5 class="txtA" style="color: black;">Configuração</h5>
                <button class="fBranco"><img src="<?=URL_BASE.'assets/img/tablet.png'?>" alt="logo" width="8%" class="icon"> <label class="label4">Meu menu digital</label></button>

                    <br><br><br><br><br>
                
                <button class="center"><img src="<?=URL_BASE.'assets/img/eye.png'?>" alt="logo" width="8%" class="iconA"> <label class="iconA">Ver meu menu</label></button>
            </div>

            <div class="col-10 fBrancoB">
                <div class="">
                    <div class="body1"></div>
                    <div class="body2"></div>
                    <div class="body3"></div>

                    <div class="textInput">
                        <label for="">Nome da empresa:</label>
                            <br>
                        <input type="text" class="inputTextA" style="color:black;" name="" id="" placeholder="Nome da empresa">
                        <hr class="linhaInputA">
                            
                    </div>
                </div>
            </div>
        </div>
    </body>