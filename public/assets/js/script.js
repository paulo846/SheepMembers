/*function ouvirAvisos() {
	$.getJSON(site + "client/api/avisos/" + stream, (function (res) {
		var $listaAvisos = $("#lista-avisos");

		$listaAvisos.empty(), $.each(res, (function (_i, aviso) {
			if (aviso.text) {
				var $row = $("<div>").addClass("col-lg-8 mt-3 offset-lg-2"),
					$card = $("<div>").addClass("card"),
					$card_header = $("<div>").addClass("card-header bg-danger text-white text-center"),
					$card_body = $("<div>").addClass("card-body bg-dark text-white p-3 text-center"),
					$title = $("<h3>").text(aviso.title),
					$paragrafo = $("<p>").html(aviso.text);
				$card_header.append($title), $card_body.append($paragrafo), $card.append($card_header).append($card_body), $row.append($card), $listaAvisos.append($row)
			} else {
				$listaAvisos.empty();
			}
		}))
	}))
}*/

function ouvirAvisos() {
	$.getJSON(site + "client/api/avisos/" + stream, (function (res) {
		var $listaAvisos = $("#lista-avisos");

		$listaAvisos.empty(), $.each(res, (function (_i, aviso) {
			if (aviso.text) {
				$listaAvisos.html('<div class="alert alert-danger mt-3">'+aviso.text+'</div>')
			} else {
				$listaAvisos.empty();
			}
		}))
	}))
}

/*
function ouvirMessage() {
	var $cardBody = $(".card-body"),
		scrollAtBottom = !0;
	$.getJSON(site + "client/api/messages/" + stream + "/" + client, (function (res) {
		var $listaMensagens = $("#lista-mensagens");
		$listaMensagens.empty(), $.each(res, (function (_index, message) {
			var $message = $("<div>").addClass("shadow p-1 mb-1 rounded"),
				$avatar = $("<div>").addClass("chat-avatar"),
				$img = $("<img>").attr("src", message.image).attr("alt", "Avatar do usuÃ¡rio"),
				$content = $("<div>").addClass("chat-content"),
				$title = $("<h5>").addClass("card-title").text(message.name),
				$text = $("<p>").addClass("card-text").html(message.message);
			$content.append($title).append($text), $avatar.append($img), $message.append($avatar).append($content), $listaMensagens.append($message)
		}));
		var scrollTop = $cardBody.scrollTop(),
			scrollHeight = $cardBody.prop("scrollHeight"),
			clientHeight = $cardBody.prop("clientHeight");
		0 === scrollTop ? scrollAtBottom = !1 : scrollTop + clientHeight === scrollHeight && (scrollAtBottom = !0), scrollAtBottom && $cardBody.animate({
			scrollTop: scrollHeight
		}, 1e3)
	})), $cardBody.on("scroll", (function () {
		var scrollTop = $(this).scrollTop(),
			scrollHeight = $(this).prop("scrollHeight"),
			clientHeight = $(this).prop("clientHeight");
		scrollAtBottom = 0 !== scrollTop && scrollTop + clientHeight === scrollHeight
	}))
}*/

function logIn() {
	$.getJSON(site + "client/api/verify", (function (res) {
		if (res) {
			window.location.href = site;
		}
	}))
}

$(document).ready((function () {
	/*ouvirMessage(),*/ ouvirAvisos(), logIn(), setInterval(ouvirAvisos, 5e3), setInterval(logIn, 5e3), $("#myForm").ajaxForm((function () {
		ouvirMessage(), $("#myForm")[0].reset()
	}))
}));