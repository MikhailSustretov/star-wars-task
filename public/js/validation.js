$('#person-form').validate({
    rules: {
        name: {
            required: true,
        },
        height: {
            required: true,
            number: true
        },
        mass: {
            required: true,
            number: true
        },
        hair_color: {
            required: true,
        },
        birth_year: {
            required: true,
        },
        gender_id: {
            required: true,
        },
        homeworld_id: {
            required: true,
        },
        'films[]': {
            required: true,
        },
        created: {
            required: true,
            date: true
        },
        url: {
            required: true,
            url: true
        },
        'image[]': {
            required: true,
        }
    },
    messages: {}
});
