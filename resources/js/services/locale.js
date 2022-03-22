export async function get(locale) {

    if (!locale && localStorage.getItem('locale')) {
        locale = localStorage.getItem('locale');
    }

    const { data } = await axios.get(route('locale.get', locale));

    let messages = {};
    data.availableLocales.forEach(l => {
        messages[l] = undefined
    });
    messages[data.locale] = data.translations;
    
    return {
        locale: data.locale,
        fallbackLocale: data.fallbackLocale,
        messages
    };

}

export async function post(locale) {
    return await axios.post(route('locale.post', locale));
}