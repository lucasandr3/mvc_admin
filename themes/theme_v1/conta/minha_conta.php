<?php $this->layout('template', ['title' => 'Minha Conta', 'menu' => 'conta', 'breadcrumb' => $breadcrumb]) ?>

<section>
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header justify-content-start">
                    <h4 class="card-title d-flex justify-content-start align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
                        </svg>
                    </h4>
                    <div class="text-left ml-1">
                        <h4 class="mb-0">Minha Conta</h4>
                        <small>Aqui estão seus dados e dados do envio de email</small>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs mb-2" style="border-radius: 0;border-bottom: 1px solid #ccc;" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="homeIcon-tab" data-toggle="tab" href="#dados" aria-controls="home" role="tab" aria-selected="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
                                </svg>
                                Meus Dados
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profileIcon-tab" data-toggle="tab" href="#email" aria-controls="profile" role="tab" aria-selected="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                                </svg>
                                Dados de E-mail
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profileIcon-tab" data-toggle="tab" href="#senha" aria-controls="profile" role="tab" aria-selected="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                                </svg>
                                Trocar Senha
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profileIcon-tab" data-toggle="tab" href="#webhook" aria-controls="profile" role="tab" aria-selected="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
                                    <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
                                    <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
                                </svg>
                                Meus Links de Webhook
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="dados" aria-labelledby="homeIcon-tab" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <form class="form form-vertical" method="post" action="<?=url('editar/conta');?>">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-icon">Código de Cliente:</label>
                                                    <input type="text" id="first-name-icon" class="form-control" readonly name="nome" value="<?=$dados['id'];?>">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-icon">Nome:</label>
                                                    <input type="text" id="first-name-icon" class="form-control" name="nome" value="<?=$dados['user_name'];?>">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="email-id-icon">E-mail</label>
                                                    <input type="email" id="email-id-icon" class="form-control" name="email" value="<?=$dados['user_email'];?>">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-success me-1 waves-effect waves-float waves-light">Salvar alterações</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="email" aria-labelledby="profileIcon-tab" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <form class="form form-vertical" method="post" action="<?=url('editar/dados_email');?>">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-icon">E-mail Host</label>
                                                    <input type="text" id="first-name-icon" class="form-control" name="email_host" value="<?=$email->email_host ?? '';?>" placeholder="Informe o host de e-mail">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="email-id-icon">Usuário</label>
                                                    <input type="email" id="email-id-icon" class="form-control" name="email_user" value="<?=$email->email_user ?? '';?>" placeholder="Informe o usuário de e-mail">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="contact-info-icon">Senha</label>
                                                    <input type="text" id="contact-info-icon" class="form-control" name="email_pass" value="<?=$email->email_pass ?? '';?>" placeholder="Informe a senha de usuário do e-mail">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="password-icon">Protocolo de Segurança</label>
                                                    <input type="text" id="password-icon" class="form-control" name="email_secure"  value="<?=$email->email_secure ?? '';?>" placeholder="Informe o protocolo de segurança">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="password-icon">Porta</label>
                                                    <input type="text" id="password-icon" class="form-control" name="email_port"  value="<?=$email->email_port ?? '';?>" placeholder="Informe a porta">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="password-icon">E-mail Remetente</label>
                                                    <input type="text" id="password-icon" class="form-control" name="email_from"  value="<?=$email->email_from ?? '';?>" placeholder="Informe o remetente">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="password-icon">Nome do Remetente</label>
                                                    <input type="text" id="password-icon" class="form-control" name="email_name"  value="<?=$email->email_name ?? '';?>" placeholder="Informe o nome do remetente">
                                                </div>
                                            </div>
                                            <input type="hidden" value="<?=(empty($email)) ? 'salvar' : 'editar';?>" name="acao">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-success me-1 waves-effect waves-float waves-light">
                                                    <?=(empty($email)) ? 'Salvar Dados' : 'Salvar alterações';?>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="senha" aria-labelledby="profileIcon-tab" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <p>Após trocar a senha será, feito o logout automático.</p>
                                </div>
                                <div class="card-body">
                                    <form class="form form-vertical" method="post" action="<?=url('editar/senha');?>">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="password-icon">Digite uma nova Senha</label>
                                                    <input type="text" id="password-icon" class="form-control" name="user_pass" placeholder="Digite aqui a senha">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-success me-1 waves-effect waves-float waves-light">Salvar alterações</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="webhook" aria-labelledby="profileIcon-tab" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <p>
                                         O Webhook é a ferramenta de API e notificações da Hotmart. Ao usá-la, é possível receber as notificações via post para a(s) URL(s) cadastradas pelo(a)
                                         Produtor(a) na plataforma Hotmart, de acordo com a atualização do status de uma transação.
                                    </p>
                                </div>
                                <div class="card-body">
                                    <form class="form form-vertical" method="post" action="<?=url('editar/senha');?>">
                                        <div class="mb-2">
                                            <h2 class="text-purchase font-weight-bold mb-1">Como Configurar</h2>
                                            <p class="ml-3">1. Acesse sua conta na Hotmart pelo link: <a href="https://app-vlc.hotmart.com/login" class="font-weight-bold">https://app-vlc.hotmart.com/login</a></p>
                                            <p class="ml-3">2. No menu lateral à esquerda, opte por Ferramentas</p>
                                            <p class="ml-3">3. Clique em Webhook (API e Notificações)</p>
                                            <p class="ml-3">4. Na nova tela, você pode adicionar suas configurações no símbolo de +</p>
                                            <p class="ml-3">5. Crie a nova configuração. Insira o nome da segmentação e marque os eventos desejados.</p>
                                        </div>
                                        <div>
                                            <h2 class="text-purchase font-weight-bold mb-1">Meus Links Webhook</h2>
                                            <?php foreach($linksWebhook as $key => $link): ?>
                                                <ul>
                                                    <li style="list-style: none;">
                                                        <p><?=$key + 1;?>. <?=$link->descricao;?>: <a href="javascript:void(0)" class="font-weight-bold"><?=$link->endpoint;?></a></p>
                                                    </li>
                                                </ul>
                                            <?php endforeach; ?>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>