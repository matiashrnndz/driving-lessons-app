$(document).ready(function () {

    const $ = document.querySelector.bind(document);
    const h = tag => document.createElement(tag);

    const text_labels = {
        en: ['MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT', 'SUN'],
    };

    // Setup

    const labels = $('#calendar .labels');
    const dates = $('#calendar .dates');

    const lspan = Array.from({length: 7}, () => {
        return labels.appendChild(h('span'));
    });

    const dspan = Array.from({length: 42}, () => {
        return dates.appendChild(h('span'));
    });

    // State mgmt

    const view = sublet({
        lang: 'en',
        offset: 0,
        year: 2020,
        month: 7,
    }, update);

    function update(state) {
        const offset = state.offset;

        // apply day labels
        const txts = text_labels[state.lang];
        lspan.forEach((el, idx) => {
            el.textContent = txts[(idx + offset) % 7];
        });

        // apply date labels (very naiive way, pt 1)
        let i = 0, j = 0, date = new Date(state.year, state.month);
        calendarize(date, offset).forEach(week => {
            for (j = 0; j < 7; j++) {
                dspan[i++].textContent = week[j] > 0 ? week[j] : '';
            }
        });

        // clear remaining (very naiive way, pt 2)
        while (i < dspan.length)
            dspan[i++].textContent = '';
    }

    // Inputs

    $('#month').onchange = ev => {
        view.month = ev.target.value;
    };

    $('#year').onchange = ev => {
        view.year = ev.target.value;
    };

});
  