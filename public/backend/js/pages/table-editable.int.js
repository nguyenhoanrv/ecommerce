$(function() {
    var e = {};
    $(".table-edits tr").editable({
        edit: function(t) {
            $(".edit i", this)
                .removeClass("fa-pencil-alt")
                .addClass("fa-save")
                .attr("title", "Save");
        },
        save: function(t) {
            const url = $(".table-edits tr").attr("data-url");
            console.log(url);
            $(".edit i", this)
                .removeClass("fa-save")
                .addClass("fa-pencil-alt")
                .attr("title", "Edit"),
                this in e && (e[this].destroy(), delete e[this]);
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });
            $.ajax({
                type: "POST",
                url: url + "/update/" + t.id,
                cache: "false",
                dataType: "json",
                data: {
                    _method: "PUT",
                    ...t
                },

                success: function(res) {
                    toastr[res.type](res.message);
                },
                error: function() {
                    toastr["error"]("Invalid data. Nothing saved");
                }
            });
        },
        cancel: function(t) {
            $(".edit i", this)
                .removeClass("fa-save")
                .addClass("fa-pencil-alt")
                .attr("title", "Edit"),
                this in e && (e[this].destroy(), delete e[this]);
        }
    });
});
