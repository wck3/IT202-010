<script>

function get_cart() {
    postData({}, "/Project/api/get_cart.php").then(data => {
        console.log(data);
        let carts = document.getElementsByClassName("cart");
        let table = document.createElement("table");
        table.className = "table card-table";
        let h = document.createElement("thead");
        h.innerHTML =
            `
                <th>Item</th>
                <th>Quantity</th>
                <th>Cost</th>
                <th>Subtotal</th>
                <th></th>
                `;
        table.appendChild(h);
        let body = document.createElement("tbody");
        if (data.data) {
            let total = 0;
            for (let r of data.data) {
                //name, c.id as line_id, item_id, quantity, cost, (cost*quantity) as subtotal
                let row = document.createElement("tr");
                total += parseInt(r.subtotal);
                row.innerHTML =
                    `
                    <td>
                    ${r.name}
                    </td>
                    <td>
                    ${r.quantity}
                    </td>
                    <td>
                    ${r.cost}
                    </td>
                    <td>
                    ${r.subtotal}
                    </td>
                    <td>
                        <button class="btn btn-danger" onclick="deleteLineItem(${r.line_id}, this)">x</button>
                    </td>
                    `;
                body.appendChild(row);
            }
            let row = document.createElement("tr");
            row.innerHTML =
                `
            <td colspan="100%">
            Total: ${total}
            </td>
            `;
            body.appendChild(row);
            row = document.createElement("tr");
            row.innerHTML =
                `
            <td colspan="100%">
            <button class="btn btn-primary" onclick="purchase_cart()">Purchase</button>
            </td>
            `;
            body.appendChild(row);
            table.appendChild(body);
            for (let cart of carts) {
                cart.innerHTML = "";
                cart.appendChild(table);
            }
        } else {
            let row = document.createElement("tr");
            row.innerHTML =
                `
            <td colspan="100%">
            No items in cart
            </td>
            `;
            for (let cart of carts) {
                cart.innerHTML = "";
                cart.appendChild(table);
            }
        }
    })
}

function purchase_cart() {
    postData({}, "/Project/api/purchase_cart.php").then(data => {
        console.log(data);
        if (data.status === 200) {
            flash(data.message, "success");
        } else {
            flash(data.message, "danger");
        }
        get_cart();
        if (refresh_balance) {
            refresh_balance();
        }
    })
}
function add_to_cart(item_id, price) {
    postData({
        item_id: item_id,
        desired_quantity: 1,
        price: price
    }, "/Project/api/add_to_cart.php").then(data => {
        if (data.status === 200) {
            flash(data.message, "success");
            if (get_cart) {
                get_cart();
            }
        } else {
            flash(data.message, "danger");
        }
    }).catch(e => {
        flash("There was a problem adding the item to cart", "danger");
    });
}
</script>