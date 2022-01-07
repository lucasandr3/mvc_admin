<?php $this->layout('template', ['title' => 'Vendas Cartao', 'menu' => 'cartoes', 'breadcrumb' => $breadcrumb]) ?>

<section>
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header justify-content-start">
                    <h4 class="card-title d-flex justify-content-start align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-credit-card-2-back-fill" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5H0V4zm11.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2zM0 11v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1H0z"/>
                        </svg>
                    </h4>
                    <div class="text-left ml-1">
                        <h4 class="mb-0">Lista Vendas Cartão</h4>
                        <small>Aqui estão todas as vendas no cartao</small>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Nome Completo</th>
                            <th>E-mail</th>
                            <th>Telefone</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($cartoes['cartoes'] as $cartao): ?>
                            <tr>
                                <td class="text-purchase">
                                    <?=$cartao->transaction;?>
                                </td>
                                <td>
                                    R$ <?=number_format($cartao->cms_aff,2,',','.');?>
                                </td>
                                <td>
                                    <?=date('d/m/Y', strtotime($cartao->purchase_date));?>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?=url('mensagem/cartao/'.$cartao->transaction);?>" class="btn btn-sm btn-success">
                                            <i data-feather="message-circle"></i> Whatsapp
                                        </a>
                                        <a href="<?=url('mensagem/cartao/email/'.$cartao->transaction);?>" class="btn btn-sm btn-danger">
                                            <i data-feather="send"></i> Enviar E-mail
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php $this->insert('../components/paginacao', ['data' => $cartoes['paginacao']]) ?>
            </div>
        </div>
    </div>
</section>