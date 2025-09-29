function showDetail(id) {
    fetch(`/oop-bookstore/actions/staff/orders/getOrderDetail.orders.php?id=${id}`)
        .then(res => res.json())
        .then(data => {
            const body = document.querySelector(`#detailModal-${id} .detail-body`);
            if (!body) return;

            if (data.length === 0) {
                body.innerHTML = '<p>No details found.</p>';
            } else {
                body.innerHTML = data.map(d => {
                    let statusText = '';
                    switch (parseInt(d.status)) {
                        case 0: statusText = 'Pending'; break;
                        case 1: statusText = 'In Transit'; break;
                        case 2: statusText = 'Completed'; break;
                        default: statusText = 'Unknown';
                    }

                    const total = (d.quantity * d.price).toLocaleString();

                    return `
                        <p><strong>Order ID:</strong> ${d.order_id}</p>
                        <p><strong>Customer:</strong> ${d.user_name}</p>
                        <p><strong>Book:</strong> ${d.book_name}</p>
                        <p><strong>Status:</strong> ${statusText}</p>
                        <p><strong>Ngày tạo:</strong> ${d.created_at}</p>
                        <p><strong>Số lượng:</strong> ${d.quantity}</p>
                        <p><strong>Giá:</strong> ${parseFloat(d.price).toLocaleString()}</p>
                        <p><strong>Thành tiền:</strong> ${total}</p>
                        <hr>
                    `;
                }).join('');
            }

            document.getElementById(`detailModal-${id}`).style.display = 'block';
        })
        .catch(err => console.error(err));
}

function closeDetail(id) {
    document.getElementById(`detailModal-${id}`).style.display = 'none';
}
