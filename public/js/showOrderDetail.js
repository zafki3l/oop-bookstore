function showDetail(id) {
    fetch(`/oop-bookstore/actions/staff/orders/getOrderDetail.orders.php?id=${id}`)
        .then(res => res.json())
        .then(data => {
            const body = document.querySelector(`#detailModal-${id} .detail-body`);
            if (!body) return;

            if (data.length === 0) {
                body.innerHTML = '<p>No details found.</p>';
                return;
            }

            let totalAll = 0;

            // Tạo header bảng
            let tableHTML = `
                <table class="detail-table" border="1" cellspacing="0" cellpadding="8" style="width:100%; text-align:center; border-collapse: collapse;">
                    <thead>
                        <tr style="background:#f4f4f4;">
                            <th>Order ID</th>
                            <th>Book Name</th>
                            <th>Status</th>
                            <th>Quantity</th>
                            <th>Price (VNĐ)</th>
                            <th>Thành tiền (VNĐ)</th>
                        </tr>
                    </thead>
                    <tbody>
            `;

            data.forEach(d => {
                let statusText = '';
                switch (parseInt(d.status)) {
                    case 0:
                        statusText = 'Pending';
                        break;
                    case 1:
                        statusText = 'In Transit';
                        break;
                    case 2:
                        statusText = 'Completed';
                        break;
                    default:
                        statusText = 'Unknown';
                }

                const total = d.quantity * d.price;
                totalAll += total;

                tableHTML += `
                    <tr>
                        <td>${d.order_id}</td>
                        <td>${d.book_name}</td>
                        <td>${statusText}</td>
                        <td>${d.quantity}</td>
                        <td>${parseFloat(d.price).toLocaleString()}</td>
                        <td>${total.toLocaleString()}</td>
                    </tr>
                `;
            });

            // Dòng tổng cuối
            tableHTML += `
                    <tr style="font-weight:bold; background:#f0f0f0;">
                        <td colspan="5" style="text-align:right;">Tổng cộng:</td>
                        <td>${totalAll.toLocaleString()}</td>
                    </tr>
                </tbody>
                </table>
            `;

            body.innerHTML = tableHTML;

            document.getElementById(`detailModal-${id}`).style.display = 'block';
        })
        .catch(err => console.error(err));
}

function closeDetail(id) {
    document.getElementById(`detailModal-${id}`).style.display = 'none';
}
