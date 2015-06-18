using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using Autofac;
using Auge.IoC.Modules;
using Autofac.Integration.Mvc;
using System.Web.Mvc;

namespace Auge.MVC
{
    public class IoCConfig
    {
        public static void RegisterDependencies()
        {
            var builder = new ContainerBuilder();

            builder.RegisterControllers(typeof(WebApiApplication).Assembly).PropertiesAutowired();

            builder.RegisterModule(new RepositoryModule());
            builder.RegisterModule(new ServiceModule());
            builder.RegisterModule(new EFModule());

            IContainer container = builder.Build();
            DependencyResolver.SetResolver(new AutofacDependencyResolver(container));
        }
    }
}