window.onload = (function(){
    document.getElementById('email').addEventListener('change',function(){
        let email = this.value;
        let resultado = email.match(/\w@\w*\.\w/);

        console.log(resultado);

        if(!resultado){
            document.getElementById('erroemail').style.display = 'block';
        }else{
            document.getElementById('erroemail').style.display = 'none';
        }
    });

    document.getElementById('senhaConf').addEventListener('change',function(){
        let senhaConf = this.value
        let senha = document.getElementById('senha').value;
        console.log();

        if(senhaConf === senha){
            document.getElementById('errosenha').style.display = 'none';
        }else{
            document.getElementById('errosenha').style.display = 'block';
        }
    });

});