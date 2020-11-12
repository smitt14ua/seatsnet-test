function updateSelect(selector, type) {
    const select = $(selector);
    if (select.attr('data-loading') !== undefined) return;
    select.attr('data-loading', 'true');
    const search = {};
    search.type = type;
    search.country = $('#country').val();
    search.region = $('#region').val();
    $.getJSON('/ajax.php', search).done((data) => {
        select.empty();
        data[type].forEach((item) => {
            const option = $('<option>').attr('value', item.id).html(item.name);
            if (search[type] && item.id === search[type]) {
                option.attr('selected', 'true');
            }
            select.append(option);
            select.trigger('change');
        });
    }).fail((e) => {
        console.error(e.responseJSON ?? e.responseText);
        alert('Что-то пошло не так... Свяжитесь с администратором.')
    }).always(() => {
        select.removeAttr('data-loading');
    });
}

$(window).on('load', () => {
    $('#country').on('change', () => updateSelect('#region', 'region'));
    $('#region').on('change', () => updateSelect('#city', 'city'));
    updateSelect('#country', 'country');
})