window.addEventListener('DOMContentLoaded', (event) => {
    const MIN_TOOLS = 14;
    const MAX_TOOLS = 1000;

    fetch("/js/persistence/tool_names.json")
    .then(data => data.json())
    .then(json => {
        const grid = document.querySelector(".grid");
        for (let i = 0; i < MIN_TOOLS; i++) {

            const criticalStock = json[i].stock_actual > 10;
            let color = "";

            if (criticalStock) {
                color = "primary";
            } else {
                color = "danger"
            }

            grid.insertAdjacentHTML(
                'afterbegin',
                `<div class="card flex-column">
                    <div class="card-body ${color}">
                        <img src="${json[i].url_image}"
                                loading="lazy" 
                                alt="imagen herramienta"/>
                        <p class="card-name ">${json[i].name}</p>
                        <p class="card-category">${json[i].category}</p>
                        <p>stock total: ${json[i].stock_total}</p>
                        <p>stock real: ${json[i].stock_actual}</p>
                    </div>
                </div>`
            );
        }
    });
});