// Importa ChartJS
import Chart from 'chart.js/auto';

document.addEventListener('DOMContentLoaded', function () {
    fetch('dashboard/chart-article')
        .then(response => response.json())
        .then(data => {
            const labels = data.map(articlesByCourse => articlesByCourse.sigla);
            const projectCounts = data.map(articlesByCourse => articlesByCourse.articles_count);

            const ctx = document.getElementById('article-chart');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Número de Artigos por Curso',
                        data: projectCounts,
                        // backgroundColor: 'rgba(34, 139, 34, 0.5)',
                        // borderColor: 'rgba(34, 139, 34, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
});

document.addEventListener('DOMContentLoaded', function () {
    fetch('dashboard/chart-project')
        .then(response => response.json())
        .then(data => {
            const labels = data.map(projectsByCourse => projectsByCourse.sigla);
            const projectCounts = data.map(projectsByCourse => projectsByCourse.projects_count);

            const ctx = document.getElementById('project-chart');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Número de TCCs por Curso',
                        data: projectCounts,
                        // backgroundColor: 'rgba(34, 139, 34, 0.5)',
                        // borderColor: 'rgba(34, 139, 34, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
});
