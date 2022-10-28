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
export function editSkill(name, description, id) {
    const params = {};
    params.name = name;
    params.description = description;
    return axios.put(`/api/skills/${id}`, params);
}

/**
 * fetches the skill by its ID
 */
export function fetchSkillById(id) {
    return axios.get(`/api/skills/${id}`);
}

