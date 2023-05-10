chat

<div class="col-lg-6 text-center">
    <div class="card chat-card card--control d-flex bg-dark text-white">
        <div class="card-body p-0">
            <div id="lista-mensagens">
            </div>
        </div>
        <div class="card-footer">
            <?= form_open('client/api/messages/' . $id, 'id="myForm"') ?>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Sua mensagem..." aria-label="Message" aria-describedby="button-addon2" id="emoji-input" name="message" required maxlength="120" autocomplete="off">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                        <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z" />
                    </svg></button>
            </div>
            </form>
        </div>
    </div>
</div>