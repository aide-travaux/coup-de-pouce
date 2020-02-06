# Coup de pouce économies d'énergie

## Introduction

La classe CoupDePouce retourne toutes les informations relatives à l'aide financière Coup de pouce économies d'énergie

## Constantes

**CoupDePouce::NOM**
Le nom de l'aide financière

**CoupDePouce::DESCRIPTION**
Une description de l'aide financière

**CoupDePouce::DELAI**
Délai de versement de l'aide financière

**CoupDePouce::DISTRIBUTEUR**
Distributeur de l'aide financière

**CoupDePouce::REFERENCES**
Références légales ou institutionnelles de l'aide financière

**CoupDePouce::CONDITIONS**
Conditions d'accès de l'aide financière

## Méthodes

```
CoupDePouce::get(DataInterface $model): ?float;
```
Retourne le montant calculé de l'aide financière sur la base des informations transmises

```
CoupDePouce::getBareme(DataInterface $model): ?array;
```
Retourne les barêmes en vigueur pour l'ouvrage transmis

```
CoupDePouce::resolveConditions(ConditionInterface $model): array;
```
Retourne les conditions d'accès à l'aide et, pour chacune, si la condition est satisfaite sur la base des 
informations transmises

```
CoupDePouce::isEligible(ConditionInterface $model): bool;
```
Retourne l'éligibilité du projet à l'aide financière sur la base des informations transmises

## Exemples

```
use AideTravaux\CoupDePouce\Model\DataInterface;
use AideTravaux\CoupDePouce\Model\ConditionInterface;
use AideTravaux\CoupDePouce\Utils\DataFormater;
use AideTravaux\CoupDePouce\CoupDePouce;

class Data implements DataInterface, ConditionInterface
{

    public function getCoupDePouceCodeTravaux(): string
    {
        return 'CDP-ISO-01';
    }

    public function getCategorieCee(): string
    {
        return 'Précarité énergétique';
    }

    public function getSurfaceIsolant(): float
    {
        return (float) 100;
    }

    public function getNombreRadiateurs(): int
    {
        return 0;
    }

    public function getTypeLogement(): string
    {
        return 'Maison individuelle';
    }

    public function getAgeLogement(): int
    {
        return 30;
    }
}

$data = new Data();

CoupDePouce::get($data);
CoupDePouce::resolveConditions($data);

```

## Base de données 

| Code | Travaux |
| ---- | ------- |
| CDP-CH-01 | Chaudière biomasse performant |
| CDP-CH-02 | Pompe à chaleur air/eau ou eau/eau |
| CDP-CH-03 | Système solaire combiné |
| CDP-CH-04 | Pompe à chaleur hybride |
| CDP-CH-05 | Raccordement à un réseau de chaleur EnR&R |
| CDP-CH-06 | Chaudière au gaz à très haute performance énergétique |
| CDP-CH-07 | Appareil de chauffage au bois très performant |
| CDP-CH-08 | Appareil électrique très performant |
| CDP-CH-09 | Remplacement d'un conduit d'évacuation des produits de combustion incompatible avec des chaudières individuelles au gaz à condensation |
| CDP-ISO-01 | Isolation des combles et toiture |
| CDP-ISO-02 | Isolation de planchers bas |

## Sources

- [Article 3-6 de l'arrêté du 29 décembre 2014 relatif aux modalités d'application du dispositif des certificats d'économies d'énergie](https://www.legifrance.gouv.fr/affichTexte.do?cidTexte=JORFTEXT000030001603)

- [Arrêté du 12 juillet 2019 modifiant l'arrêté du 29 décembre 2014 relatif aux modalités d'application du dispositif des certificats d'économies d'énergie et mettant en place des bonifications pour certaines opérations standardisées d'économies d'énergie](https://www.legifrance.gouv.fr/jo_pdf.do?id=JORFTEXT000038772486)
