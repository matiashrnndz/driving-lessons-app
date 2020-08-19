
$(document).ready(function () {

    const $ = document.querySelector.bind(document);
    const h = tag => document.createElement(tag);

    const text_labels = ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'];

    const labels = $('#calendar .labels');
    const dates = $('#calendar .dates');
    
    const lspan = Array.from({length: 7}, () => {
        return labels.appendChild(h('span'));
    });

    const dspan = Array.from({length: 42}, () => {
        return dates.appendChild(h("span"));
    });

    const view = sublet({
        year: 2020,
        month: 7,
    }, update);

    function update(state) {
        
        lspan.forEach((el, idx) => {
            el.textContent = text_labels[(idx) % 7];
        });

        const offset = 0;
        let i = 0, j = 0, date = new Date(state.year, state.month);
        calendarize(date, offset).forEach(week => {
            for (j = 0; j < 7; j++) {
                dspan[i].textContent = week[j] > 0 ? week[j] : '';
                if (week[j] != '') {
                    dspan[i].id = state.year + '-' + 0+(state.month + 1) + '-' + week[j];
                    if (j != 0 && j != 6) {
                        loadColor(dspan[i].id);
                    }
                }
                i++;
            }
        });

        while (i < dspan.length)
            dspan[i++].textContent = '';
    }

});
