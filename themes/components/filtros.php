<div class="card shadow mb-1">
    <div class="p-2 box" id="busca-box">
        <div class="form-row align-items-end">

            <div class="col-md-6">
                <label for="tipoBuscaProcesso">Buscar por:</label>
                <select name="tipoBuscaProcesso" id="tipoBuscaProcesso" onchange="trocaCampoJulgamento(this.value)"
                        class="form-control">
                    <option value="" selected="">Selecione o termo de busca</option>
                    <option value="nome">NOME</option>
                    <option value="documento">DOCUMENTO</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="tipoBuscaJulgamento">Busca:</label>
                <input class="form-control" type="text" name="busca-filtro" placeholder="Digite aqui o que procura">
            </div>
        </div>


        <div class="form-row align-items-end mt-1">
            <div class="col-md-9 mt-3 mt-md-0" id="campo-data">
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="dataInicio">De</label>
                        <input type="date" id="dataInicio" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label for="dataFim">Até</label>
                        <input type="date" id="dataFim" class="form-control">
                    </div>
                </div>
            </div>

            <div class="col-md-3 mt-3 mt-md-0">
                <div class="form-row">
                    <button id="buttonBusca" class="btn btn-success text-uppercase font-weight-bold w-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                        <span>Buscar</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>