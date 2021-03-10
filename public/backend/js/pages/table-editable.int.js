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
            $(".edit i", this)
                .removeClass("fa-save")
                .addClass("fa-pencil-alt")
                .attr("title", "Edit"),
                this in e && (e[this].destroy(), delete e[this]);
            console.log(t);
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });
            $.ajax({
                type: "POST",
                url: "category/update/" + t.id,
                cache: "false",
                dataType: "json",
                data: {
                    _method: "PUT",
                    category_name: t.category_name
                },

                success: function(res) {
                    if (res.check) toastr[res.type](res.message);
                },
                error: function() {
                    console.log("err");
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
