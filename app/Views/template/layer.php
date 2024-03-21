<?php
echo $this->include('components/header');
echo $this->include('components/sidebar');
echo $this->renderSection('content');
echo $this->include('components/footer');
?>