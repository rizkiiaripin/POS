class Permission {
    constructor() {}
    index() {
        return $.ajax({
            url: "/ajax/permissions",
            type: "GET",
            dataType: "json",
            success: function (data) {
                console.log(data.permissions);

                let tableBody = "";
                $.each(data.permissions, function (index, permission) {
                    tableBody += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${permission.name}</td>
                        <td class="no-wrap">
                            <button  data-id="${
                                permission.id
                            }" class="btn btn-warning btn-sm waves-effect waves-light" ">
                                <i class="ti ti-edit "></i>
                            </button>
                            <button type="button" onclick="deleteItem(event)" class="btn btn-danger btn-sm waves-effect waves-light">
                                <i class="ti ti-trash "></i>
                            </button>
                        </td>
                    </tr>
                `;
                });
                $("#table-body").html(tableBody);
            },
            error: function (xhr, status, error) {
                console.error(error);
            },
        });
    }
    post() {
        return $.ajax({
            url: "/ajax",
            type: "POST",
            dataType: "json",
            data: {
                name: "John Doe",
            },
            success: function (data) {
                console.log(data.message);
                $("#alert").html(data.message);
            },
            error: function (xhr, status, error) {
                console.error(error);
            },
        });
    }
}
