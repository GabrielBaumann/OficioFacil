<?php $this->layout('layout_user', ['usuarios' => $usuarios]); ?>


    <?php $this->insert("listUsers", ["usuarios" => $usuarios, "countUser" => $countUser, "paginator" => $paginator]); ?>
