function cookie(e, t = !1, i = !1) {
    if (!t && -1 != i) {
        for (var a = e + "=", s = document.cookie.split(";"), n = 0; n < s.length; n++) {
            for (var c = s[n];
                " " == c.charAt(0);) c = c.substring(1, c.length);
            if (0 == c.indexOf(a)) return c.substring(a.length, c.length)
        }
        return null
    }
    if (i) {
        var o = new Date;
        o.setTime(o.getTime() + 24 * i * 60 * 60 * 1e3);
        var l = "; expires=" + o.toGMTString()
    } else l = "";
    document.cookie = e + "=" + t + l + "; path=/"
}

function removeCookie(e) {
    cookie(e, "", -1)
}

function resultlist(e) {
    Array.isArray(e) ? ($.each(e, function(t, i) {
        e[t] && (e[t] = '<li><input spellcheck="false" value="' + e[t] + '"></input><a class="copy"><i class="material-icons">file_copy</i></a></li>')
    }), e = e.join("\n")) : e = '<li><input spellcheck="false" value="' + e + '"></input><a class="copy"><i class="material-icons">file_copy</i></a></li>', $("#resultlist .card-body").html('<ul class="linklist">' + e + "</ul>")
}

function resulttext(e) {
    Array.isArray(e) && e && (e = e.join("\n")), $("#resultlist .card-body").html('<div class="textarea"><textarea class="autosize nowrap">' + e + "</textarea></div>"), autosize($("textarea.autosize"))
}

function notif(e, t) {
    "success" == t ? $(".notification").prepend('<div class="success new"><i class="material-icons">check</i> ' + e + "</div>") : "danger" == t ? $(".notification").prepend('<div class="danger" new><i class="material-icons">close</i> ' + e + "</div>") : "warning" == t && $(".notification").prepend('<div class="warning" new><i class="material-icons">warning</i> ' + e + "</div>"), $(".notification .new").removeClass("new").stop(!0, !0).delay(2e3).animate({
        opacity: 0
    }, 500, function() {
        $(this).remove()
    })
}
if (function(e) {
        e.fn.niceSelect = function(t) {
            function i(t) {
                t.after(e("<div></div>").addClass("nice-select").addClass(t.attr("class") || "").addClass(t.attr("disabled") ? "disabled" : "").attr("tabindex", t.attr("disabled") ? null : "0").html('<span class="current"></span><ul class="list"></ul>'));
                var i = t.next(),
                    a = t.find("option"),
                    s = t.find("option:selected");
                i.find(".current").html(s.data("display") || s.text()), a.each(function(t) {
                    var a = e(this),
                        s = a.data("display");
                    i.find("ul").append(e("<li></li>").attr("data-value", a.val()).attr("data-display", s || null).addClass("option" + (a.is(":selected") ? " selected" : "") + (a.is(":disabled") ? " disabled" : "")).html(a.text()))
                })
            }
            if ("string" == typeof t) return "update" == t ? this.each(function() {
                var t = e(this),
                    a = e(this).next(".nice-select"),
                    s = a.hasClass("open");
                a.length && (a.remove(), i(t), s && t.next().trigger("click"))
            }) : "destroy" == t ? (this.each(function() {
                var t = e(this),
                    i = e(this).next(".nice-select");
                i.length && (i.remove(), t.css("display", ""))
            }), 0 == e(".nice-select").length && e(document).off(".nice_select")) : console.log('Method "' + t + '" does not exist.'), this;
            this.hide(), this.each(function() {
                var t = e(this);
                t.next().hasClass("nice-select") || i(t)
            }), e(document).off(".nice_select"), e(document).on("click.nice_select", ".nice-select", function(t) {
                var i = e(this);
                e(".nice-select").not(i).removeClass("open"), i.toggleClass("open"), i.hasClass("open") ? (i.find(".option"), i.find(".focus").removeClass("focus"), i.find(".selected").addClass("focus")) : i.focus()
            }), e(document).on("click.nice_select", function(t) {
                0 === e(t.target).closest(".nice-select").length && e(".nice-select").removeClass("open").find(".option")
            }), e(document).on("click.nice_select", ".nice-select .option:not(.disabled)", function(t) {
                var i = e(this),
                    a = i.closest(".nice-select");
                a.find(".selected").removeClass("selected"), i.addClass("selected");
                var s = i.data("display") || i.text();
                a.find(".current").text(s), a.prev("select").val(i.data("value")).trigger("change")
            }), e(document).on("keydown.nice_select", ".nice-select", function(t) {
                var i = e(this),
                    a = e(i.find(".focus") || i.find(".list .option.selected"));
                if (32 == t.keyCode || 13 == t.keyCode) return i.hasClass("open") ? a.trigger("click") : i.trigger("click"), !1;
                if (40 == t.keyCode) {
                    if (i.hasClass("open")) {
                        var s = a.nextAll(".option:not(.disabled)").first();
                        s.length > 0 && (i.find(".focus").removeClass("focus"), s.addClass("focus"))
                    } else i.trigger("click");
                    return !1
                }
                if (38 == t.keyCode) {
                    if (i.hasClass("open")) {
                        var n = a.prevAll(".option:not(.disabled)").first();
                        n.length > 0 && (i.find(".focus").removeClass("focus"), n.addClass("focus"))
                    } else i.trigger("click");
                    return !1
                }
                if (27 == t.keyCode) i.hasClass("open") && i.trigger("click");
                else if (9 == t.keyCode && i.hasClass("open")) return !1
            });
            var a = document.createElement("a").style;
            return a.cssText = "pointer-events:auto", "auto" !== a.pointerEvents && e("html").addClass("no-csspointerevents"), this
        }
    }(jQuery), $(document).ready(function() {
        ($("select").niceSelect(), $("input[type=checkbox].switch").each(function() {
            var e = $(this).attr("class"),
                t = $(this).attr("name"),
                i = $(this).attr("id"),
                a = $(this).attr("value");
            $(this).after('<label class="simple-switch-outter ' + (a ? "checked" : "unchecked") + '"><input type="text"' + (t ? ' name="' + t + '" ' : "") + (i ? ' id="' + i + '" ' : "") + (a ? ' value="1" ' : " ") + 'class="' + (e ? e + " " : "") + 'simple-switch" checked><span class="simple-switch-circle"></span></label>'), $(this).remove()
        }), $(document).on("mousedown", ".simple-switch-outter", function() {
            $(this).is(".unchecked") ? $(this).removeClass("unchecked").addClass("checked").find("input").attr("value", 1) : $(this).removeClass("checked").addClass("unchecked").find("input").attr("value", "")
        }), window.location.hash) && ($(window.location.hash).length > 0 && $(window.location.hash).parent().is("[tab_id]") && ($('[data_tab="' + $(window.location.hash).parent().attr("tab_id") + '"]').find(".active").removeClass("active"), $('[tab_select="' + window.location.hash.substring(1) + '"]').addClass("active"), $(window.location.hash).parent().find(">div").removeClass("active"), $(window.location.hash).addClass("active")));
        $("textarea.autosize").each(function() {
            autosize($(this))
        })
    }), $("#result_list").on("click", function() {
        $(this).is(".active") || ($(this).parent().find(".active").removeClass("active"), $(this).addClass("active"), resultlist($("#resultlist .card-body textarea").val().split("\n")), cookie("result_list", !0))
    }), $("#result_text").on("click", function() {
        if (!$(this).is(".active")) {
            $(this).parent().find(".active").removeClass("active"), $(this).addClass("active");
            var e = [];
            $(".linklist li").each(function() {
                e.push($(this).find("input").val())
            }), resulttext(e), removeCookie("result_list")
        }
    }), $("#generate").on("click", function() {
        var e = $("#linklist").val(),
            t = $("#type").next().find(".selected").attr("data-value"),
            i = $("#shortlink").attr("value"),
            a = document.URL.substr(0, document.URL.lastIndexOf("/")),
            s = new FormData;
        s.append("linklist", e), s.append("type", t), s.append("shortlink", i), s.append("url", a), s.append("get", "batch_encode"), $.ajax({
            url: "api.php",
            data: s,
            processData: !1,
            contentType: !1,
            type: "POST",
            success: function(e) {
                (e = JSON.parse(e)).error ? console.log(e.error) : (cookie("result_list") ? ($("#result_list").click(), resultlist(e.linklist)) : ($("#result_text").click(), resulttext(e.linklist)), $("#resultlist").addClass("active"))
            }
        })
    }), $(document).on("click", "[copy]", function(e) {
        var t = $(this).parent().find("input").val(),
            i = $("<input>");
        $("body").append(i), i.val(t).select(), document.execCommand("copy"), i.remove()
    }), $(document).on("click", ".copy", function(e) {
        var t = $(this).parent().find("input").val(),
            i = $("<input>");
        $("body").append(i), i.val(t).select(), document.execCommand("copy"), i.remove(), notif("Copied", "success"), $(this).parent().find("input").select()
    }), $("[data_tab] [tab_select]").on("click", function() {
        if (!$(this).is(".active")) {
            $(this).parent().find(".active").removeClass("active"), $(this).addClass("active");
            var e = $('[tab_id="' + $(this).parent().attr("data_tab") + '"'),
                t = $("#" + $(this).attr("tab_select"));
            e.find(">div").removeClass("active"), t.addClass("active"), window.location.hash = $(this).attr("tab_select"), $(".alert.response").remove()
        }
    }), $(".card-head.toggle").on("click", function() {
        $(this).parent().is(".nobody") ? $(this).parent().removeClass("nobody") : $(this).parent().addClass("nobody")
    }), $("[afterload]").length > 0) {
    var link = $("[afterload]").attr("afterload");
    $("[afterload]").attr("afterload", ""), $(document).ready(function() {
        $("[afterload]").attr("href", link), $("[afterload]").removeClass("disabled").html("Download").removeAttr("afterload")
    })
}
if ($("[countdown]").length > 0) {
    var count = $("[countdown]").attr("countdown");
    link = $("[countdown]").attr("countdown_href");
    $("[countdown]").removeAttr("countdown_href"), $(document).ready(function() {
        var e = setInterval(function() {
            0 == count && (clearInterval(e), $("[countdown]").attr("href", link).html("Download").removeClass("disabled").removeAttr("countdown")), $("[countdown]").html(count), count--
        }, 1e3)
    })
}
$("#nav_toggle i").on("click", function() {
    $("#navbar").is(".active") ? $("#navbar").removeClass("active") : $("#navbar").addClass("active")
}), $(document).on("click", "#shortlink", function() {
    $(this).attr("value") ? cookie("shortlink", "1") : removeCookie("shortlink")
});