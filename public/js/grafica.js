const grafica = document.getElementById("grafica-dashboard")

new Chart(grafica,{
    type: 'bar',

    data: {
        labels: [
            'Empleados',
            'Proveedores',
            'Productos'
        ],

        datasets: [{
            label: 'Cantidad de registros',
            data: [
                empleados,
                proveedores,
                productos
            ],
            backgroundColor: [
                '#4e73df',
                '#1cc88a',
                '#f6c23e'
            ], 
            borderWidth: 1
        }]
    },

    options: {
        responsive: true,
        maintainAspectRatio: false,

        plugins: {
            title: {
                display: true,
                text: 'Registros del Sistema'
            }
        },

        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});