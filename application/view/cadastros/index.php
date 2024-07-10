<div class="container">
    <h1>Cadastros</h1>
    <h2>You are in the View: application/view/cadastros/index.php (everything in this box comes from that file)</h2>
    <!-- add cadastro form -->
    <div class="box">
        <h3>Adicionar pessoa</h3>
        <form action="<?php echo URL; ?>cadastro/addcadastro" method="POST">
            <label>Nome</label>
            <input type="text" name="nome" value="" required />
            <label>Email</label>
            <input type="email" name="email" value="" required />
            <label>CPF</label>
            <input type="text" name="CPF" value="" required />
            <input type="submit" name="submit_add_cadastro" value="Submit" />
        </form>
    </div>
    <!-- main content output -->
    <div class="box">
        <h3>Número de cadastros: <?php echo $amount_of_cadastros; ?></h3>
        <h3>Quantidade de cadastros  (via AJAX)</h3>
        <div id="javascript-ajax-result-box"></div>
        <div>
            <button id="javascript-ajax-button">Clique aqui para receber a quantidade de cadastros via Ajax (will be displayed in #javascript-ajax-result-box ABOVE)</button>
        </div>
        <h3>Lista de cadastros (data from model)</h3>
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>Id</td>
                <td>Nome</td>
                <td>Email</td>
                <td>CPF</td>
                <td>DELETE</td>
                <td>EDIT</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($cadastros as $cadastro) { ?>
                <tr>
                    <td><?php if (isset($cadastro->id)) echo htmlspecialchars($cadastro->id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($cadastro->nome)) echo htmlspecialchars($cadastro->nome, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($cadastro->email)) echo htmlspecialchars($cadastro->email, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($cadastro->CPF)) echo htmlspecialchars($cadastro->CPF, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><a href="<?php echo URL . 'cadastro/deletecadastro/' . htmlspecialchars($cadastro->id, ENT_QUOTES, 'UTF-8'); ?>">delete</a></td>
                    <td><a href="<?php echo URL . 'cadastro/editcadastro/' . htmlspecialchars($cadastro->id, ENT_QUOTES, 'UTF-8'); ?>">edit</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
