import Chart from "chart.js/auto";

(async function () {
    new Chart(document.getElementById("acquisitions"), {
        type: "bar",
        data: {
            labels: penjualan.map((row) => row.bulan),
            datasets: [
                {
                    label: "Omzet Penjualan Per Bulan",
                    data: penjualan.map((row) => row.total_harga),
                },
            ],
        },
    });
    new Chart(document.getElementById("barang"), {
        type: "pie",
        data: {
            labels: barang.map((row) => row.nama_produk),
            datasets: [
                {
                    label: "Stok Barang",
                    data: barang.map((row) => row.stok),
                    hoverOffset: 10,
                },
            ],
        },
        options: {
            layout:{
                padding:0,
            },
            plugins: {
                legend: {
                    position: "bottom",
                    align: "start",
                    maxHeight: 200,
                    labels: {
                        usePointStyle: true,
                        pointStyle: "circle",
                        padding: 10,
                        color: "black",
                    },
                },
            },
        },
    });
})();
