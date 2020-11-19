export function getValidationErrors(e) {
    const {errors} = e.response.data
    if (!errors) return {}
    return errors
}
