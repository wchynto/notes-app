import swal from 'sweetalert2'
export const alertSuccess = (title, message) => {
    swal.fire({
        icon: 'success',
        title: title,
        text: message,
        customClass: {
            confirmButton: 'bg-blue-600'
        }
    })
}

export const alertError = (title, message) => {
    swal.fire({
        icon: 'error',
        title: title,
        text: message,
        customClass: {
            confirmButton: 'bg-blue-600'
        }
    })
}

export const alertInfo = (title, message) => {
    swal.fire({
        icon: 'info',
        title: title,
        text: message,
        customClass: {
            confirmButton: 'bg-blue-600'
        }
    })
}

export const alertWarning = (title, message) => {
    swal.fire({
        icon: 'warning',
        title: title,
        text: message,
        customClass: {
            confirmButton: 'bg-blue-600'
        }
    })
}

export const alertConfirm = async (title, message) => {
    return swal.fire({
        icon: 'warning',
        title: title,
        text: message,
        showCancelButton: true,
        cancelButtonText: 'Tidak',
        confirmButtonText: 'Iya',
        customClass: {
            confirmButton: 'bg-blue-600',
            cancelButton: 'bg-red-600'
        }
    })
}
