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
 * delete a skill
 */
 export function deleteSkill(skillId) {
    
    
    return axios.delete(`/api/skills/${skillId}`);
}


