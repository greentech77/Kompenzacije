import { format as formatDate } from 'date-fns'

export function decimalFormat(value) {
    if (isNaN(value) || value == undefined) {
        return value
    }
    return ('' + value).replace('.', ',')
}

export function dateFormat(value, format = 'dd. M. yyyy') {
    if (value === undefined) {
        return value
    }
    try {
        return formatDate(value, format)
    } catch (e) {
        return value
    }
}

export function booleanFormat(value) {
    if (typeof value == 'boolean') {
        return this.$t(`booleans.${value.toString()}`)
    } else {
        return  value
    }
}