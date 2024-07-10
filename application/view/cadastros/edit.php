<?php
if (isset($_GET['error']) && $_GET['error'] == 'invalid_cpf') {
    echo "<script>alert('CPF inválido! Por favor insira um CPF válido.');</script>";
}
?>
<div class="container">
    <h2>You are in the View: application/view/cadastros/edit.php (everything in this box comes from that file)</h2>
    
    <div>
        <h3>Editar um cadastro</h3>
        <form action="<?php echo URL; ?>cadastro/updatecadastro" method="POST">
            <label>Nome</label>
            <input autofocus type="text" name="nome" value="<?php echo htmlspecialchars($cadastro->nome, ENT_QUOTES, 'UTF-8'); ?>" required />
            <label>Email</label>
            <input autofocus type="email" name="email" value="<?php echo htmlspecialchars($cadastro->email, ENT_QUOTES, 'UTF-8'); ?>" required />
            <label>CPF</label>
            <input autofocus type="text" name="CPF" value="<?php echo htmlspecialchars($cadastro->CPF, ENT_QUOTES, 'UTF-8'); ?>" required />
            <input type="hidden" name="cadastro_id" value="<?php echo htmlspecialchars($cadastro->id, ENT_QUOTES, 'UTF-8'); ?>" />
            <input type="submit" name="submit_update_cadastro" value="Update" />
        </form>
    </div>
</div>

