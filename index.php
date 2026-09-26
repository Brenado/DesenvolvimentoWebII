<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Pagina Web</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="main">
        <h1>Minha Página Web</h1>
        <p>Esta é uma página web.</p>
        <p>Um mardéfolo de orcose que petirisava jandes com basnetões sopreria se a bexata bortelhada asfarinhasse,<br> mas as ruminas promeriam o donopelho se bexília desmifizasse.</p>
        <img src="https://casa.abril.com.br/wp-content/uploads/2021/03/tipos-de-flores-para-decorar-seu-ambiente-casa.com-15-ninfeia.jpg?quality=70&strip=info&w=1024" alt="Flor">
    </div>

    <form method="POST">
        <h1>Cadastro</h1>
        <label for="nome">Nome:</label><br>
        <input type="text" name="nome" id="nome" placeholder="Nome" required><br>
        <label for="email">E-mail:</label><br>
        <input type="email" name="email" id="email" placeholder="E-mail" required><br>
        <label for="telefone">Telefone:</label><br>
        <input type="tel" name="telefone" id="telefone" placeholder="xx xxxxx-xxxx" pattern="[0-9]{2} [0-9]{5}-[0-9]{4}" required><br>
        <button type="submit">Cadastrar</button>
    </form>

    <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $telefone = $_POST["telefone"];

            echo "Nome: $nome<br>";
            echo "Email: $email<br>";
            echo "Telefone: $telefone<br>";
            
            $database_url = getenv("DATABASE_URL");
            
            $conexao = pg_connect($database_url);

            pg_query_params(
                $conexao,
                "INSERT INTO usuarios(nome, email, telefone) VALUES ($1, $2, $3)",
                array($nome, $email, $telefone)
            );

            echo "<p style='color:red'>Cadastro realizado</p>";
        }
    ?>

</body>
</html>
