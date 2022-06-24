-- Select *
-- from Portfoilo_Project..CovidVaccinations
-- order by 3,4;


--Select data that we are going to be using
Select Location, date, total_cases, new_cases, total_deaths, population
from Portfoilo_Project..CovidDeaths
order by 1,2;

-- Looking at the total cases vs total deaths
--Likelyhood of dying when contracting covid
Select Location, date, total_cases, total_deaths, (total_deaths/total_cases)*100 as Death_Percentage
from Portfoilo_Project..CovidDeaths
where location like '%states%'
order by 1,2;

--Looking at total cases vs population
--Percent of people contracting covid
Select Location, date, total_cases, population, (total_cases/population)*100 as Contraction_Percentage
from Portfoilo_Project..CovidDeaths
-- where location like '%states%'
order by 1,2;

Select Location, population, max(total_cases) Highest_Infection_Count, max((total_cases/population))*100 as PercentPopulationInfected
from Portfoilo_Project..CovidDeaths
-- where location like '%states%'
group by Location, population
order by PercentPopulationInfected desc;


-- Countries with the highest death count by population
Select Location, max(cast(total_deaths as int)) as total_death_count
from Portfoilo_Project..CovidDeaths
-- where location like '%states%'
where continent is not null
group by Location
order by total_death_count desc;

--Highest death count by continent
Select Location, max(cast(total_deaths as int)) as total_death_count
from Portfoilo_Project..CovidDeaths
-- where location like '%states%'
where continent is null
group by Location
order by total_death_count desc;


--Global scale of cases vs deaths
Select sum(new_cases) as total_cases, sum(cast(new_deaths as int)) as total_deaths, 
sum(cast(new_deaths as int))/sum(new_cases)*100 as Death_Percentage
from Portfoilo_Project..CovidDeaths
where continent is not NULL
--group by date
order by 1,2;


--CTE for Looking at total population vs vaccination in United States
with Pop_vs_Vac(Continent, Location, Date, population, new_vaccinations, Rolling_Count_Vaccinations)
as
(
select dea.continent, dea.location, dea.date, dea.population, vac.new_vaccinations,
sum(cast(new_vaccinations as int)) over (partition by dea.location order by dea.location, dea.date) as Rolling_Count_Vaccinations
from Portfoilo_Project..CovidVaccinations vac
JOIN Portfoilo_Project..CovidDeaths dea
    on dea.location = vac.location and dea.date = vac.date
where dea.continent is not NULL and dea.location like '%states%' and new_vaccinations is not null
-- order by 2,3
)
Select *, (Rolling_Count_Vaccinations/population)*100 as Percentage_of_vaccinated
FROM Pop_vs_Vac
order by date asc;


--Temp table for Looking at total population vs vaccination in United States
DROP table if EXISTS #Percentage_of_vaccinated
CREATE Table #Percentage_of_vaccinated
(
    Continent NVARCHAR(255),
    location NVARCHAR(255),
    Date DATETIME,
    Population NUMERIC,
    New_Vaccination NUMERIC,
    Rolling_Count_Vaccinations NUMERIC
)

insert into #Percentage_of_vaccinated
select dea.continent, dea.location, dea.date, dea.population, vac.new_vaccinations,
sum(cast(new_vaccinations as int)) over (partition by dea.location order by dea.location, dea.date) as Rolling_Count_Vaccinations
from Portfoilo_Project..CovidVaccinations vac
JOIN Portfoilo_Project..CovidDeaths dea
    on dea.location = vac.location and dea.date = vac.date
where dea.continent is not NULL and dea.location like '%states%' and new_vaccinations is not null
-- order by 2,3

Select *, (Rolling_Count_Vaccinations/population)*100 as Percentage_of_vaccinated
FROM #Percentage_of_vaccinated

GO

--CREATING VIEW FOR VISUALIZATIONS
CREATE View PercentageofVaccinated AS
select dea.continent, dea.location, dea.date, dea.population, vac.new_vaccinations,
sum(cast(new_vaccinations as int)) over (partition by dea.location order by dea.location, dea.date) as Rolling_Count_Vaccinations
from Portfoilo_Project..CovidVaccinations vac
JOIN Portfoilo_Project..CovidDeaths dea
    on dea.location = vac.location and dea.date = vac.date
where dea.continent is not NULL and 
dea.location like '%states%' and new_vaccinations is not null
-- order by 2,3


SELECT * from PercentageofVaccinated;