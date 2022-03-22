import AdminLayout from '@/Layouts/AdminLayout.vue'

export default function (h, page) {

    return h(AdminLayout, {
        componentName: page.type.name
    }, () => page)

}