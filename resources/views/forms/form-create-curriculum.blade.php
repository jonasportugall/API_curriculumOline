<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Expansível</title>
    <style>
        .section {
            margin-bottom: 20px;
        }

        .section button{
            cursor: pointer;
        }

        .sub-form {
            display: none;
        }
    </style>
</head>
<body>

<form action="/storee" method="POST">
    @csrf

    <div class="section">
        <h2>Dados Pessoais <button type="button" onclick="toggleSubForm('dados-pessoais')">+</button></h2>
        <div class="sub-form" id="dados-pessoais">
            <!-- Campos para dados pessoais -->
            Nome: <input type="text" name="name"><br>
         
            Email: <input type="email" name="email"><br>
            <!-- Adicione mais campos conforme necessário -->

            @error('name')
                 <p>{{ $message }}</p>
             @enderror
        </div>
    </div>

    <div class="section">
        <h2>Formações <button type="button" onclick="toggleSubForm('formacoes')">+</button></h2>
        <div class="sub-form" id="formacoes">
            <!-- Campos para formações -->
            Curso: <input type="text" name="curso"><br>
            Instituição: <input type="text" name="instituicao"><br>
            <!-- Adicione mais campos conforme necessário -->
        </div>
    </div>

    <!-- Adicione seções semelhantes para 'Cursos', 'Tecnologias', 'Experiências' -->

    <button type="submit">Enviar</button>
</form>

<script>
    function toggleSubForm(sectionId) {
        var subForm = document.getElementById(sectionId);
        if (subForm.style.display === 'none' || subForm.style.display === '') {
            subForm.style.display = 'block';
        } else {
            subForm.style.display = 'none';
        }
    }
</script>

</body>
</html>
