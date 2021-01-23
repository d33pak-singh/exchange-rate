Nova.booting((Vue, router, store) => {
  router.addRoutes([
    {
      name: 'currency',
      path: '/currency',
      component: require('./components/Tool'),
    },
  ])
})
