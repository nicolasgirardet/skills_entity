import axios from 'axios';

/**
 * Create a new skill
 * @param {FormData} skill
 * @param {string} contentType
 * @returns {Promise}
 */
export function postNewSkill(book) {
    return axios.post('/api/livres/create-skill', skill, {
        headers: {
            'content-type': 'multipart/form-data',
        },
    });
}

export function editSkill(book) {
    const params = {};
    params.name = skill.name;
    params.description = skill.name;
    return axios.put(`/api/skilss/${book.id}`, params);
}