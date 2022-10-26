import axios from 'axios';

/**
 * @param {string|null} argument
 * @returns {Promise}
 */
export function postSkill(name, description) {
    const params = {};
    params.name = name;
    params.description = description;
    
    return axios.post('/api/skills', params);
}

/**
 * deletes a skill
 */
 export function deleteSkill(id) {    
    return axios.delete(`/api/skills/${id}`);
}

/**
 * modifies a skill
 */
export function editSkill(skill) {
    const params = {};
    params.name = skill.name;
    params.description = skill.description;
    return axios.put(`/api/skills/${skill.id}`, params);
}


